<?php //no space above php tag and ob_start();
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('DEBUG',true); //we want to see all errors

include 'credentials.php'; //stores db info
include 'common.php'; //stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//create default page identifier
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//set website defaults
$config->title = THIS_PAGE;
$config->banner = 'Sprockets';
$config->subbanner = '1701 Broadway | Seattle, WA 98122 | 206.999.0000';



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

//echo THIS_PAGE;
//echo basename($_SERVER['PHP_SELF']);
//die;

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


