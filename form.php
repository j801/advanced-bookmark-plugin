<div class="wrap" style="">
<?php if(isset($_POST['submit'])):?>
<h2>Made Project File</h2>
  <a class="button" href="<?php print plugins_url( '', __FILE__ ); ?>/project.zip">DownLoad</a>

<h2>Made config.json</h2>
<p>You can upload monaca_project_files by MonacaPress.<br>
If you have project, you can copy json string to paste config.json .
</p>
<textarea style="width:500px;height:360px">
<?php print $json;?>
</textarea>
<p>
You can Upload MonacaAdvancedBookmark.<br>
Go MonacaPress and upload project file to monaca.mobi.
</p>
<?php endif;?>
<h2>Input your shop's informations</h2>
<p>
You should make config.json file for App.
So you need input your shop's informations.
If you use MonacaIDE, You can change config.json after make project.
</p>
<form action="" method="post" autocomplete="off">
<h3 class="title">Access</h3>
<table class="form-table">
  <tr>
    <th>zip</th>
    <td>
      <input type="text" name="access[zip]" value="<?php print esc_attr($config['access']['zip']); ?>">
 <?php //     <input type="text" name="access[zip]" value="<?php print esc_attr($config->access->zip); ?>
    </td>
  </tr>
  <tr>
    <th>address</th>
    <td>
      <input type="text" name="access[address1]" value="<?php print esc_attr($config['access']['address1']); ?>" class="regular-text"><br>
      <input type="text" name="access[address2]" value="<?php print esc_attr($config['access']['address2']); ?>" class="regular-text"><br>
      <input type="text" name="access[address3]" value="<?php print esc_attr($config['access']['address3']); ?>" class="regular-text"><br>
      <input type="text" name="access[address4]" value="<?php print esc_attr($config['access']['address4']); ?>" class="regular-text">
    </td>
  </tr>
  <tr>
    <th>stations</th>
    <td>
      <?php
      // station_number give empty input.
      for ($i = 0; $i < $stations_number; $i++) {
        $value = "";
        if (isset($config['access']['stations'][$i])) {
          $value = $config['access']['stations'][$i];
        }

        ?><input type="text" name="access[stations][<?php $i; ?>]" value="<?php
        print esc_attr($value); 
        ?>" class="regular-text"><br><?php
      }
      ?>
    </td>
  </tr>
</table>
<h3 class="title">Maps(GeoLocation)</h3>
<table class="form-table">
  <tr>
    <th>latitude</th>
    <td>
      <input type="text" name="access[latitude]" value="<?php print esc_attr($config['access']['latitude']); ?>" class="regular-text">
    </td>
  </tr>
  <tr>
    <th>longitude</th>
    <td>
      <input type="text" name="access[longitude]" value="<?php print esc_attr($config['access']['longitude']); ?>" class="regular-text">
    </td>
  </tr>
</table>
<h3 class="title">Contact</h3>
<table class="form-table">
  <tr>
    <th>Tel</th>
    <td>
      <input type="text" name="contact[tel]" value="<?php print esc_attr($config['contact']['tel']); ?>" class="regular-text">
    </td>
  </tr>
</table>
<h3 class="title">Open</h3>
<table class="form-table">
  <tr>
    <th>hours</th>
    <td>
      <input type="text" name="open[hours]" value="<?php print esc_attr($config['open']['hours']); ?>" class="regular-text">
    </td>
  </tr>
  <tr>
    <th>day</th>
    <td>
      <input type="text" name="open[day]" value="<?php print esc_attr($config['open']['day']); ?>" class="regular-text">
    </td>
  </tr>
  <tr>
    <th>temporary_closure</th>
    <td>
      <input type="text" name="open[temporary_closure]" value="<?php print esc_attr($config['open']['temporary_closure']); ?>" class="regular-text">
    </td>
  </tr>
</table>

<h3 class="title">Feed</h3>
<p>Input Feed URL for Information</p>
<table class="form-table">
  <tr>
    <th>Feed URL</th>
    <td>
      <input type="text" name="feed" value="<?php print esc_attr($config['feed']); ?>" class="regular-text">
    </td>
  </tr>
</table>

<p class="submit">
      <input class="button-primary" type="submit" name="submit" value="submit">
</p>
</form>
</div>
