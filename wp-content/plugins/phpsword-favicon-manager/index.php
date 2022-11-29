<?php
/*
Plugin Name: PhpSword Favicon Manager
Plugin URI: https://pkplugins.com/
Description: PhpSword Favicon Manager is a WordPress plugin to add a favicon to your WordPress website. Favicon is a small image or logo displayed in the address bar of a web browser. By using this plugin, you can easily upload and display favicon icon on your website built in WordPress.
Author: Pradnyankur Nikam
Author URI: https://pkplugins.com/
Version: 1.0
License: GPLv2
*/

class PhpswFaviconManager {

public $PhpswFMOptions;

// construct function
function PhpswFaviconManager(){
$this->PhpswFMOptions = get_option('PhpswFaviconManagerOptions');
$this->register_settings_and_field();
}

// PhpSword Favicon Manager Plugins page
function PhpswFaviconManagerPage(){
?>
<div id="wrap">
<?php $PhpswFaviconManagerOptions = get_option('PhpswFaviconManagerOptions'); ?>
<h2>PhpSword Favicon Manager</h2>
version <?php echo $PhpswFaviconManagerOptions['PhpswFMVersion']; ?>
	<form action="options.php" method="post" id="PhpswFaviconManagerForm" enctype="multipart/form-data">
	<?php
	PhpswFaviconManager::PhpswUpdateMessage();
	settings_fields('PhpswFaviconManagerOptions');
	do_settings_sections(__FILE__);
	?>
	<p>
	<strong>Please Note: </strong>Check the following tips before uploading a favicon image.<br />
	<strong>Standard Resolutions: </strong>16x16, 32x32, 48x48, 96x96, 180x180 OR 192x192 | <strong>Format: </strong>.png, .gif or .ico | <strong>Size: </strong>Maximum 25kb or less to minimize website loading time.<br />
	</p>
	<p><input type="submit" name="submit" class="button-primary" value="Save Changes" /></p>
	</form>
<hr />
<p><strong>Thank you for installing and using PhpSword Favicon Manager WordPress plugin.</strong><br />
<ul>
<li>Share your experience by rating the plugin.</li>
<li>Provide your valuable feedback and suggestions to improve the quality of this plugin.</li>
<li>Test this plugin in different WordPress versions and vote in the Compatibility section, so that other users can check compatibility and download appropriate version.</li>
<li>Browse and install more <a href="https://pkplugins.com/" title="Free WordPress Plugins for your website at pkplugins.com">Free WordPress Plugins for your website.</a></li>
</ul>
</p>
</div>
<?php
}

// Register group, section and fields
public function register_settings_and_field()
{
register_setting('PhpswFaviconManagerOptions', 'PhpswFaviconManagerOptions', array($this, 'PhpswFMValidateSettings'));
add_settings_section('PhpswFMSection', 'PhpSword Favicon Manager Setting', array($this, 'PhpswFMSectionCB'), __FILE__);
add_settings_field('PhpswFavStatus', 'Display Favicon: ', array($this, 'FavStatusSetting'), __FILE__, 'PhpswFMSection');
add_settings_field('PhpswFavImg1', 'Favicon Image 1: ', array($this, 'PhpswFavImg1Setting'), __FILE__, 'PhpswFMSection');
add_settings_field('PhpswFavImg2', 'Favicon Image 2: ', array($this, 'PhpswFavImg2Setting'), __FILE__, 'PhpswFMSection');
add_settings_field('PhpswActiveFavicon', 'Choose Favicon: ', array($this, 'PhpswActiveFaviconSetting'), __FILE__, 'PhpswFMSection');
}

// PhpswFMSection callback function
public function PhpswFMSectionCB()
{
}

// Validate submitted images and upload
public function PhpswFMValidateSettings($PhpswFMOptions)
{
$PhpswFMOptions['PhpswFMVersion'] = $this->PhpswFMOptions['PhpswFMVersion'];
$PhpswFMOptions['PhpswFMVersionType'] = $this->PhpswFMOptions['PhpswFMVersionType'];
$override = array('test_form' => false);
if(!empty($_FILES['PhpswFavImg1']['tmp_name'])){
	$file1 = wp_handle_upload($_FILES['PhpswFavImg1'], $override); $PhpswFMOptions['FavURL1'] = $file1['url'];
} else { $PhpswFMOptions['FavURL1'] = $this->PhpswFMOptions['FavURL1']; }
if(!empty($_FILES['PhpswFavImg2']['tmp_name'])) {
	$file2 = wp_handle_upload($_FILES['PhpswFavImg2'], $override); $PhpswFMOptions['FavURL2'] = $file2['url'];
} else { $PhpswFMOptions['FavURL2'] = $this->PhpswFMOptions['FavURL2']; }
return $PhpswFMOptions;
}

// Enable or Disable favicon field
function FavStatusSetting(){
echo '<select name="PhpswFaviconManagerOptions[PhpswFavStatus]">';
echo '<option value="1"';
if(!empty($this->PhpswFMOptions['PhpswFavStatus']) && ($this->PhpswFMOptions['PhpswFavStatus']=='1'))
{ echo ' Selected '; } echo '>Enable</option>';
echo '<option value="2"';
if(!empty($this->PhpswFMOptions['PhpswFavStatus']) && ($this->PhpswFMOptions['PhpswFavStatus']=='2'))
{ echo ' Selected '; } echo '>Disable</option>';
echo '</select>';
}

// Favicon image 1 upload field
function PhpswFavImg1Setting(){
echo '<input type="file" name="PhpswFavImg1" id="PhpswFavImg1" />';
echo '&nbsp; &nbsp; &nbsp;';
if(isset($this->PhpswFMOptions['FavURL1'])){
echo "<img src=\"".$this->PhpswFMOptions['FavURL1']."\" alt=\"Favicon Image 1\" width=\"32\" height=\"32\" />";
} else { echo "<img src=\"".plugins_url()."/PhpSword-Favicon-Manager/images/favicon.png\" alt=\"Favicon Image 1\" width=\"32\" height=\"32\" />"; }
}

// Favicon image 2 upload field
function PhpswFavImg2Setting(){
echo '<input type="file" name="PhpswFavImg2" id="PhpswFavImg2" />';
echo '&nbsp; &nbsp; &nbsp;';
if(isset($this->PhpswFMOptions['FavURL2'])){
echo "<img src=\"".$this->PhpswFMOptions['FavURL2']."\" alt=\"Favicon Image 2\" width=\"32\" height=\"32\" />";
} else { echo "<img src=\"".plugins_url()."/PhpSword-Favicon-Manager/images/favicon.png\" alt=\"Favicon Image 1\" width=\"32\" height=\"32\" />"; }
}

// Select favicon image field
function PhpswActiveFaviconSetting(){
echo '<input type="radio" name="PhpswFaviconManagerOptions[PhpswActiveFavicon]" id="PhpswFaviconManagerOptions[PhpswActiveFavicon]" value="img1"';
if(isset($this->PhpswFMOptions['PhpswActiveFavicon']) && $this->PhpswFMOptions['PhpswActiveFavicon']=='img1')
{ echo ' Checked'; } echo '/> Favicon Image 1';
echo '&nbsp; &nbsp; &nbsp;';
echo '<input type="radio" name="PhpswFaviconManagerOptions[PhpswActiveFavicon]" id="PhpswFaviconManagerOptions[PhpswActiveFavicon]" value="img2"';
if(isset($this->PhpswFMOptions['PhpswActiveFavicon']) && $this->PhpswFMOptions['PhpswActiveFavicon']=='img2')
{ echo ' Checked'; } echo '/> Favicon Image 2';
}

// Adds a menu on left column.
function PhpswFaviconManagerMenu(){
add_menu_page('PPhpSword Favicon Manager', 'PhpSw Favicon', 'administrator', 'phpsword-favicon-manager', array('PhpswFaviconManager', 'PhpswFaviconManagerPage'));
}

// Display Favicon on the website
function PhpswShowFavicon(){
$PhpswFMOptions = get_option('PhpswFaviconManagerOptions');
	// If favicon display enabled
	if($PhpswFMOptions['PhpswFavStatus'] == '1'){
		$ActiveFav = $PhpswFMOptions['PhpswActiveFavicon'];
		switch($ActiveFav){
		case 'default': $PhpswFavUrl = plugins_url().'/PhpSword-Favicon-Manager/images/favicon.png'; break;
		case 'img1': $PhpswFavUrl = $PhpswFMOptions['FavURL1']; break;
		case 'img2': $PhpswFavUrl = $PhpswFMOptions['FavURL2']; break;
		default: $PhpswFavUrl = plugins_url().'/PhpSword-Favicon-Manager/images/favicon.png'; break;
		}
	echo '<link rel="shortcut icon" href="' . $PhpswFavUrl . '" />';
	}
}

// Update message
function PhpswUpdateMessage(){
if($_GET['page'] == 'phpsword-favicon-manager' && ($_GET['updated'] == 'true' || $_GET['settings-updated'] == 'true')){
?>
<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Settings saved.</strong></p></div>
<?php
}
}

} // End: class PhpswFaviconManager

function PhpswFaviconManagerActivation(){
$DefaultFavUrl = plugins_url().'/PhpSword-Favicon-Manager/images/favicon.png';
update_option('PhpswFaviconManagerOptions', array('PhpswFMVersion' => '1.0', 'PhpswFMVersionType' => 'free', 'PhpswFavStatus' => '1', 'PhpswActiveFavicon' => 'default', 'FavURL1' => $DefaultFavUrl, 'FavURL2' => $DefaultFavUrl));
}
register_activation_hook(__FILE__,'PhpswFaviconManagerActivation');

function InstantiatePhpswFaviconManager(){
new PhpswFaviconManager();
}
add_action('admin_init', 'InstantiatePhpswFaviconManager');

function RegisterPhpswFaviconManagerMenu(){
PhpswFaviconManager::PhpswFaviconManagerMenu();
}
add_action('admin_menu', 'RegisterPhpswFaviconManagerMenu');

function PhpswDisplayFavicon(){
PhpswFaviconManager::PhpswShowFavicon();
}
add_action('wp_head', 'PhpswDisplayFavicon');
add_action('admin_head', 'PhpswDisplayFavicon');
?>