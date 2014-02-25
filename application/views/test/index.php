<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
  var api_base = '<?=base_url()?>';

  function callAPI(key, endpoint, data, method, output_div) {
    $.ajax({
      url: api_base + endpoint,
      type: method,
      beforeSend: function(xhr) {
        //xhr.setRequestHeader('X-API-KEY', key);
      },
      success: function(data) {
        $('#' + output_div).html(JSON.stringify(data, null, ' '));
      },
      error: function(xhr, status, err) {
        if(xhr.responseText != '') {
          var error_data = $.parseJSON(xhr.responseText);

          if(error_data) {
            $('#' + output_div).html(JSON.stringify(error_data, null, ' '));
          }
        }
        else {
          $('#' + output_div).html('');
        }
      },
      data: $.param($.parseJSON(data))
    });
  }
</script>

<div class="control-group">
  <div class="controls">
    API Key: <br />
    <select id="venue-api-key" class="input-xxlarge">
      <?php foreach($api_keys as $api_key) : ?>
      <option value="<?php echo $api_key->key ?>"><?php echo $api_key->key ?></option>
      <?php endforeach ?>
    </select>
  </div>
</div>

<ul>
  <!--li><a href="#venues">Venues</a></li>
  <li><a href="#patrons">Patrons</a></li>
  <li><a href="#sessions">Cloak Sessions</a></li>
  <li><a href="#number">Tag number</a></li-->
</ul>

<h1 id="user">User</h1>

<!-- login/login -->
<form>
  <fieldset>
    <legend>User Login</legend>
    <p><b>Endpoint:</b> /user/fblogin</p>
    <p><b>Method:</b> POST</p>
    <div class="control-group">
      <div class="controls">
        <b>Parameters:</b><br/>
        <textarea id="api-user-login-data" rows="5" style="width:500px;">
        {
          "email": "",
          "password": "monkey19"
        }
        </textarea>
      </div>
    </div>
    <input value="Test" type="button" class="btn" onclick="callAPI('', 'user/fblogin', $('#api-user-login-data').val(), 'POST', 'api-user-login-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>
<pre id="api-user-login-update">
{
  "id": 1,
  "name": "Eve",
  "cloak_price: "5.00",
  "api_key": "e013a78f6c5ec04a32b7c88b0f8f3ca99f42c1ec"
}
</pre>


<!-- venues/:venue_id -->
<form>
  <fieldset>
    <legend>Venue Get</legend>
    <p><b>Endpoint:</b> /<input type="text" id="venue-get-endpoint" value="venues/1" /></p>
    <p><b>Method:</b> GET</p>
    <input value="Test" type="button" class="btn" onclick="callAPI($('#venue-api-key').val(), $('#venue-get-endpoint').val(), '{}', 'GET', 'api-venues-get-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>
<pre id="api-venues-get-update">
{
  "id": 1,
  "name": "Eve",
  "cloak_price: "5.00",
  "api_key": "e013a78f6c5ec04a32b7c88b0f8f3ca99f42c1ec"
}
</pre>



<h1 id="patrons">Patrons</h1>
<!-- patrons/locate -->
<form>
  <fieldset>
    <legend>Patron Locate</legend>
    <p><b>Endpoint:</b> /patrons/locate</p>
    <p><b>Method:</b> GET</p>
    <div class="control-group">
      <div class="controls">
        <b>Parameters:</b><br />
        <textarea id="api-patrons-locate-data" rows="4" style="width:500px;">
{
  "mobile": "0448789894"
}</textarea>
      </div>
    </div>
    <input value="Test" type="button" class="btn" onclick="callAPI($('#venue-api-key').val(), 'patrons/locate', $('#api-patrons-locate-data').val(), 'GET', 'api-patrons-locate-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>
<pre id="api-patrons-locate-update">
{
  "results": [
    {
      "id": 1,
      "mobile": "0448789894", "email: "chris@inoutput.io", "firstname": "Chris", "lastname": "Rickard", "gender: "M",
      "dob: "5.00"
    }
  ]
}
</pre>


<!-- patrons/add -->
<form>
  <fieldset>
    <legend>Patron Add</legend>
    <p><b>Endpoint:</b> /patrons</p>
    <p><b>Method:</b> POST</p>
    <div class="control-group">
      <div class="controls">
        <b>Parameters:</b><br />
        <textarea id="api-patrons-add-data" rows="9" style="width:500px;">
{
  "mobile": "0448789894",
  "email": "chris@inoutput.io",
  "firstname": "Chris",
  "lastname": "Rickard",
  "gender": "M",
  "dob": "19­-08­-1982",
  "facebook_id": "123456789"
}</textarea>
      </div>
    </div>
    <input value="Test" type="button" class="btn" onclick="callAPI($('#venue-api-key').val(), 'patrons', $('#api-patrons-add-data').val(), 'POST', 'api-patrons-add-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>
<pre id="api-patrons-add-update">
{
  "id": 3,
  "mobile": "0448789894",
  "email": "chris@inoutput.io",
  "firstname": "Chris",
  "lastname": "Rickard",
  "gender": "M",
  "dob": "19­-08­-1982",
  "facebook_id": "123456789"
}
</pre>



<h1 id="sessions">Cloak Sessions</h1>
<!-- /venues/:venue_id/cloak_sessions -->
<form>
  <fieldset>
    <legend>CloakSession Create</legend>
    <p><b>Endpoint:</b> /<input type="text" id="session-create-endpoint" value="venues/1/cloak_sessions" class="input-xlarge" /></p>
    <p><b>Method:</b> POST</p>
    <div class="control-group">
      <div class="controls">
        <b>Parameters:</b><br />
        <textarea id="api-session-create-data" rows="4" style="width:500px;">
{
  "patron_id": 1,
  "items_count": 2,
  "tag_number": :reserve_tag_number,
}</textarea>
      </div>
    </div>
    <input value="Test" type="button" class="btn" onclick="callAPI($('#venue-api-key').val(), $('#session-create-endpoint').val(), $('#api-session-create-data').val(), 'POST', 'api-session-create-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>
<pre id="api-session-create-update">
{
  "id": 1,
  "patron_id": 1,
  "venue_id": 1,
  "items_count": 2,
  "tag_number": 1,
  "is_checked_out": 0,
  "checked_in_date": "19/08/2013 8:00pm"
}
</pre>


<!-- /venues/:venue_id/cloak_sessions/:id -->
<form>
  <fieldset>
    <legend>CloakSession Edit</legend>
    <p><b>Endpoint:</b> /<input type="text" id="session-edit-endpoint" value="venues/1/cloak_sessions/:id" class="input-xlarge" /></p>
    <p><b>Method:</b> PUT</p>
    <div class="control-group">
      <div class="controls">
        <b>Parameters:</b><br />
        <textarea id="api-session-edit-data" rows="4" style="width:500px;">
{
  "items_count": 3,
  "is_checked_out": 1
}</textarea>
      </div>
    </div>
    <input value="Test" type="button" class="btn" onclick="callAPI($('#venue-api-key').val(), $('#session-edit-endpoint').val(), $('#api-session-edit-data').val(), 'PUT', 'api-session-edit-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>
<pre id="api-session-edit-update">
{
  "id": 1,
  "patron_id": 1,
  "venue_id": 1,
  "items_count": 2,
  "tag_number" 1,
  "checked_in_date": "19/08/2013 8:00pm",
  "is_checked_out": 1,
  "checked_out_date": "19/08/2013 9:15pm"
}
</pre>


<!-- /venues/:venue_id/cloak_sessions -->
<form>
  <fieldset>
    <legend>CloakSessions List</legend>
    <p><b>Endpoint:</b> /<input type="text" id="session-list-endpoint" value="venues/1/cloak_sessions" class="input-xlarge" /></p>
    <p><b>Method:</b> GET</p>
    <div class="control-group">
      <div class="controls">
        <b>Parameters:</b><br />
        <textarea id="api-session-list-data" rows="4" style="width:500px;">
{
  "type": "default",
  "search": ""
}</textarea>
      </div>
    </div>
    <input value="Test" type="button" class="btn" onclick="callAPI($('#venue-api-key').val(), $('#session-list-endpoint').val(), $('#api-session-list-data').val(), 'GET', 'api-session-list-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>
<pre id="api-session-list-update">
{
  "results": [
    {
      "id": 1,
      "items_count": 2,
      "tag_number": 1,
      "is_checked_out": 0,
      "checked_in_date": "19­08­198 9:16pm",
      "patron": {
        "id": 1,
        "firstname": "Chris",
        "lastname": "Rickard"
      }
    }
  ],
  "total_rows": 1,
  "total_pages": 1,
  "has_next": false,
  "has_previous": false,
  "items_on_page": 1,
  "page_size": 25
}
</pre>


<!-- /venues/:venue_id/statistics -->
<form>
  <fieldset>
    <legend>Cloak Statistics</legend>
    <p><b>Endpoint:</b> /<input type="text" id="session-statistics-endpoint" value="venues/1/statistics" class="input-xlarge" /></p>
    <p><b>Method:</b> GET</p>
    <div class="control-group">
      <div class="controls">
        <b>Parameters:</b><br />
        <textarea id="api-session-statistics-data" rows="4" style="width:500px;">
{
  "from": "<?php echo date('d-m-Y') ?>",
  "to": "<?php echo date('d-m-Y') ?>"
}</textarea>
      </div>
    </div>
    <input value="Test" type="button" class="btn" onclick="callAPI($('#venue-api-key').val(), $('#session-statistics-endpoint').val(), $('#api-session-statistics-data').val(), 'GET', 'api-session-statistics-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>
<pre id="api-session-statistics-update">
{
  "number_of_cloak_sessions": 12,
  "total_earned": 133.50,
  "average_stay_length": "1 hour, 45 mins",
  "males": {
    "number_of_cloak_sessions": 9,
    "average_stay_length": "1 hour, 55 mins"
  },
  "females": {
    "number_of_cloak_sessions": 3,
    "average_stay_length": "1 hour, 28 mins"
  },
  "number_of_cloak_sessions_over_time": {
    "19­08­2013": 3,
    "20­08­2013": 4,
    "21­08­2013": 6
  }
}
</pre>

<h1 id="number">Tag number</h1>
<!-- venues/:venue_id/reserve_tag_number -->
<form>
  <fieldset>
    <legend>Reserve tag number Get</legend>
    <p><b>Endpoint:</b> /<input type="text" id="reserve-tag-get-endpoint" value="venues/1/reserve_tag_number" /></p>
    <p><b>Method:</b> GET</p>
    <input value="Test" type="button" class="btn" onclick="callAPI($('#venue-api-key').val(), $('#reserve-tag-get-endpoint').val(), '{}', 'GET', 'api-tag-number-get-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>
<pre id="api-tag-number-get-update">
{
  "tag_number": 1,
}
</pre>

<!-- venues/:venue_id/reserve_tag_number/:tag_number -->
<form>
  <fieldset>
    <legend>Unreserve tag number PUT</legend>
    <p><b>Endpoint:</b> /<input type="text" class="span4" id="unreserve-tag-get-endpoint" value="venues/1/unreserve_tag_number/:tag_number" /></p>
    <p><b>Method:</b> PUT</p>
    <input value="Test" type="button" class="btn" onclick="callAPI($('#venue-api-key').val(), $('#unreserve-tag-get-endpoint').val(), '{}', 'PUT', 'api-untag-number-get-update')" />
 </fieldset>
</form>
<p><b>Output</b></p>