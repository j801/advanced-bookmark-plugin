<?php
/*
Plugin Name: MonacaAdvancedBookmark
Plugin URI: https://github.com/j801/advanced-bookmark-plugin
Description: The MonacaAdvancedBookmark Plugin is generator smart devices application's source code. It can make simple app like bookmark.
Version: 1.0
Author: YUKI OKAMOTO (HN:Justice)
Author URI: http://press.monaca.mobi/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('admin_menu', 'monaca_advanced_bookmark_admin_menu');
register_activation_hook( __FILE__, 'monaca_advanced_bookmark_generator_activate' );
register_uninstall_hook(__FILE__, 'monaca_advanced_bookmark_generator_uninstall'); 

function monaca_advanced_bookmark_generator_uninstall() {
  return true;
}
function monaca_advanced_bookmark_generator_activate() {
  return true;
}
function monaca_advanced_bookmark_admin_menu() 
{
  add_menu_page(
    'Bookmark',
    'Bookmark',
    'administrator',
    'default',
    'monaca_advanced_bookmark_generator'
  );
}

function monaca_advanced_bookmark_generator () 
{
  // load config.json to array
  $config = file_get_contents(__dir__ . '/config.json');
  $config = json_decode($config, true);

  // set number of stations input.
  $stations_number = 1;
  $stations_number_default = 3;
  if (count($config['access']['stations']) >= $stations_number_default) {
    $stations_number += count($config['access']['stations']);
  } else {
    $stations_number += $stations_number_default;
  }

  // generate json file
  if (isset($_POST['submit'])) {
    $exclude_keys = array('submit');
    $config = $_POST;

    foreach ($exclude_keys as $key) {
      unset($config[$key]);
    }

    foreach ($config['access']['stations'] as $key=>$val) {
      if (strlen($val)) {
        continue;
      }
      unset($config['access']['stations'][$key]);
    }

    $json = json_encode($config);

    // set newlines
    $json = str_replace(array(','), ",\n", $json);

    // write config.json and update zip file
    file_put_contents(__dir__ . '/config.json', $json);
    monaca_update_project(__dir__ ."/project.zip", __dir__ ."/config.json");
  }

  // view form
  include 'form.php';
}

// update zipfile's config.json
function monaca_update_project($zip_file = "project.zip", $json_file = "config.json")
{
  $zip = new ZipArchive();

  if ($zip->open($zip_file, ZipArchive::CREATE)!==TRUE) {
    exit("cannot open <$zip_file>\n");
  }

  $zip->deleteName("advanced-bookmark-master/assets/www/js/config.json");
  $zip->addFile($json_file, "advanced-bookmark-master/assets/www/js/config.json");

  $zip->close();
}
?>
