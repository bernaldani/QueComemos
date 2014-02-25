<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Wa Image Resizer
 *
 */
class Qc_Resizer
{
    /**
     * CI Front Controller Instance
     *
     * @var CI_Controller
     */
    var $CI;

    /**
     * List of errors
     *
     * @var array
     */
    var $errors = array();

    /**
     * Path to the uploads folder
     *
     * @var array
     */
    var $uploads_path = '';

    /**
     * Class constructor
     *
     * @param array $rules
     */
    function __construct()
    {
        $this->CI =& get_instance();
        $this->uploads_path = str_replace("\\", "/", FCPATH . 'uploads');
    }

    function get_errors()
    {
        return $this->errors;
    }

    /**
     *
     * @param array $file
     * @param string $size
     * @param string $type
     * @return string
     */
    function resize($file, $size = '96x96', $type = 'relative')
    {
        // Reset errors array
        $this->errors = array();

        // Make sure the file exists
        //var_dump($this->uploads_path);
        $source_file = $this->uploads_path . '/photos/' . $file['file_name'];
        if ($source_file)
        {
            // Check the size and get the requested width and height
            if (is_string($size))
                $size = explode('x', $size);
            $width = (int)$size[0];
            $height = (int)$size[1];

            // Check if this file was already resized
            $destination_path = $this->uploads_path . "/{$width}x{$height}";
            $destination_file = $destination_path . "/" . $file['file_name'];
            $thumb_url = "uploads/{$width}x{$height}/{$file['file_name']}";

            if ( ! file_exists($destination_file))
            {
                // Check destination path and create it if necessary
                if ( ! is_dir($destination_path))
                {
                    if ( ! mkdir($destination_path, 0777))
                    {
                        $this->errors[] = 'Error while re-creating resize folders.';
                        return FALSE;
                    }
                }

                // Resize the image
                if ($type == 'relative')
                    $this->resize_relative($source_file, $destination_file, $width, $height);
                else
                    $this->resize_absolute($source_file, $destination_file, $width, $height);

                return $thumb_url;
            }
            else
                return $thumb_url;
        }
        else
        {
            // the file doesn't exists, return false
            $this->errors[] = 'The given file does not exists.';
            return FALSE;
        }
    }

    /**
     * Resize an image using a relative width and height
     * (resized images meets either the max width and/or height)
     *
     * @param string $source_file
     * @param string $dest_file
     * @param integer $dest_width
     * @param integer $dest_height
     * @return boolean
     */
    function resize_relative($source_file, $dest_file, $dest_width, $dest_height)
    {
        // Load CI Image Library
        $config['image_library']    = 'gd2';
        $config['source_image']     = $source_file;
        $config['new_image']        = $dest_file;
        $config['width']            = $dest_height;
        $config['height']           = $dest_height;
        $config['create_thumb']     = TRUE;
        $config['thumb_marker']     = '';
        $config['maintain_ratio']   = TRUE;

        // Load Library
        $this->CI->load->library('image_lib');
        $this->CI->image_lib->initialize($config);

        // Resize image
        $this->CI->image_lib->resize();
        $this->CI->image_lib->clear();
    }

    /**
     * Resize an image using an absolute width and height
     * (resized images meets requested width and height)
     *
     * @param string $source_file
     * @param string $dest_file
     * @param integer $dest_width
     * @param integer $dest_height
     * @param integer $jpg_quality
     * @return boolean
     */
    function resize_absolute($source_file, $dest_file, $dest_width, $dest_height, $jpg_quality = 80)
    {
        $result = array();

        if ( ! file_exists($source_file)) return FALSE;

        if ( ! function_exists('getimagesize'))
            return FALSE;
        else
            list($src_width, $src_height, $file_type, ) = getimagesize($source_file);

        switch ($file_type)
        {
            case 1 :
                $src_handler = imagecreatefromgif($source_file);
                break;

            case 2 :
                $src_handler = imagecreatefromjpeg($source_file);
                break;

            case 3 :
                $src_handler = imagecreatefrompng($source_file);
                break;

            default :
                return FALSE;
        }

        if ( ! $src_handler) return FALSE;

        // Defining Shape
        if ($src_height < $src_width)
        {
            // Source has a horizontal Shape
            $ratio = (double)($src_height / $dest_height);
            $copy_width = round($dest_width * $ratio);

            if ($copy_width > $src_width)
            {
                $ratio = (double)($src_width / $dest_width);
                $copy_width = $src_width;
                $copy_height = round($dest_height * $ratio);
                $x_offset = 0;
                $y_offset = round(($src_height - $copy_height) / 2);
            }
            else
            {
                $copy_height = $src_height;
                $x_offset = round(($src_width - $copy_width) / 2);
                $y_offset = 0;
            }
        }
        else
        {
            // Source has a Vertical Shape
            $ratio = (double)($src_width / $dest_width);
            $copy_height = round($dest_height * $ratio);

            if ($copy_height > $src_height)
            {
                $ratio = (double)($src_height / $dest_height);
                $copy_height = $src_height;
                $copy_width = round($dest_width * $ratio);
                $x_offset = round(($src_width - $copy_width) / 2);
                $y_offset = 0;
            }
            else
            {
                $copy_width = $src_width;
                $x_offset = 0;
                $y_offset = round(($src_height - $copy_height) / 2);
            }
        }

        // Let's figure it out what to use
        if (function_exists('imagecreatetruecolor'))
        {
            $create	= 'imagecreatetruecolor';
            $copy	= 'imagecopyresampled';
        }
        else
        {
            $create	= 'imagecreate';
            $copy	= 'imagecopyresized';
        }

        $dst_handler = $create($dest_width, $dest_height);

        $copy($dst_handler, $src_handler, 0, 0, $x_offset, $y_offset, $dest_width, $dest_height, $copy_width, $copy_height);

        switch ($file_type)
        {
            case 1 :
                @imagegif($dst_handler, $dest_file);
                $result = TRUE;
                break;

            case 2 :
                // Code taken from CI Image_lib Library
                // PHP 4.4.1 bug #35060 - workaround
                if (phpversion() == '4.4.1') @touch($dest_file);
                @imagejpeg($dst_handler, $dest_file, $jpg_quality);
                $result = TRUE;
                break;

            case 3 :
                @imagepng($dst_handler, $dest_file);
                $result = TRUE;
                break;

            default :
                return FALSE;
        }

        //  Kill the file handlers
        imagedestroy($src_handler);
        imagedestroy($dst_handler);

        // Set the file to 777 -- From CI Image_lib Library
        @chmod($dest_file, DIR_WRITE_MODE);

        return $result;
    }
}
