<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <title><?php echo $template['title'] ?></title>
    <link href="favicon.ico" rel="shortcut icon">
    <?php echo $template['metadata'] ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php echo $template['partials']['header'] ?>

    <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
        <?php echo $template['partials']['flash_messages'] ?>
        <?php echo $template['body'] ?>
        <?php echo $template['partials']['footer'] ?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo $template['fmetadata'] ?>

  </body>
</html>
