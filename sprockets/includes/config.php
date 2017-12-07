<?php //no space above php tag and ob_start();
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'sprockets_fl17_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

define('DEBUG',true); //we want to see all errors

include 'credentials.php'; //stores db info
include 'common.php'; //stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//create default page identifier
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF
$sub_folder = 'sprockets';//change to 'widgets' or 'sprockets' etc.

//add subfolder, in this case 'sprockets' if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
$config->virtual_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;
$config->theme = 'BusinessCasual';//sub folder to themes

define('ADMIN_PATH', $config->virtual_path . '/admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . '/includes/');

//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}

//END NEW THEME STUFF

//set website defaults
$config->title = THIS_PAGE;
$config->banner = 'Sprockets';
$config->subbanner = '1701 Broadway | Seattle, WA 98122 | 206.999.0000';
$config->loadhead = '';//place items in <head> element
$config->loadfoot = '';//place to store items just before body tag
$config->hero = '';//will store random hero icon

switch(THIS_PAGE){
      
    case 'index.php':
            $config->title = 'Sprockets - Home';   
    break;   
    case 'about.php':
            $config->title = 'About Us';        
    break;
    case 'daily.php':
            $config->title = 'Daily Photo';
            $config->subbanner = 'Sample Work'; 
    break;
    case 'customers.php':
            $config->title = 'Customers';
    break; 
    case 'whisky_list.php':
            $config->title = 'Scottish Whisky';
    break; 
    case 'whisky_view.php':
            $config->title = 'Whisky Details';
            //unclear on using variable to pull name from db
    break; 
    case 'appointments.php':
            $config->title = 'Appointments';
            $config->banner = 'Set Your Appointment';
            $config->subbanner = 'Hours: Mon - Fri 9:00 - 17:00 Sat/Sun 11:00 - 15:30';
    break;
    case 'contact.php':
            $config->title = 'Contact Page';   
            $config->banner = 'We Want to Hear From You';
            $config->subbanner = 'Office 206.999.0000';
    break;

}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . '/themes/' . $config->theme . '/';
//END NEW THEME STUFF
?>

?>
<?php
/**
 * config.php provides a place to store configuration info, 
 * such as your reCAPTCHA site keys
 *
 * @package nmCAPTCHA2
 * @author Bill & Sara Newman <williamnewman@gmail.com>
 * @version 1.01 2015/11/17
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see contact_include.php 
 * @see recaptchalib.php
 * @see util.js 
 * @todo none
 */

//Here are the keys for the server: brianwise.xyz
$siteKey = "6LdsqjYUAAAAAEORMMBGZM_W-Tii3HMaGAn0wOTL";
$secretKey = "6LdsqjYUAAAAAEQxX9MRSixoVDIeOzTzZRVPR1R3";

//START CONFIG SNIPPET #3

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '


        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>


    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '

        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>

    ';

}

//END CONFIG SNIPPET #3


