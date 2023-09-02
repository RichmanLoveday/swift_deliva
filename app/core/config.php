<?php
define("WEBSITE_TITLE", 'MY SHOP');
define('FLUTTER_PUBLIC_KEY', 'FLWPUBK_TEST-d005af2403d98e5f8dc90367a3f6fa1a-X');
define('FLUTTER_SECRET_KEY', 'FLWSECK_TEST-863c5a524726f9e3b25db545bc3f641b-X');

// database name
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('DB_NAME', "swift_deliva");
    define('DB_HOST_NAME', 'localhost');
    define('DB_USER', "root");
    define('DB_PASS', "");
    define('DB_TYPE', 'mysql');
}

// else {
//     define('DB_NAME', "id21004202_eshop");
//     define('DB_HOST_NAME', 'localhost');
//     define('DB_USER', "id21004202_eshopper");
//     define('DB_PASS', "Chukwunonye1.");
//     define('DB_TYPE', 'mysql');
// }


define('DEBUG', true);

if (DEBUG) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}

// for root url
$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace('index.php', '', $path);

define('ROOT', $path);
define('ASSETS', $path . "assets/");
define("JS", ASSETS . 'js/');
define('IMAGES', ASSETS . 'images/');
define('CSS', ASSETS . 'css/');
// define('IMAGES', $path . "assets/" . THEME . "/images/");

// ROELS
define('CUSTOMER', 'customer');
define('DRIVER', 'driver');
define('ADMIN', 'admin');
define('SUPER_ADMIN', 'super_admin');


// driver statuses
define('OFFLINE', 0);
define('ONDUTY', 1);
define('DRIVE_DISABLED', 3);

// package status
define('PENDING_PACKAGE', 0);
define('APPROVED_PACKAGE', 1);
define('DELIEVRED_PACAKGES', 2);
define('CANCELED_PACKAGE', 3);
define('PACKAGE_FAILED', 4);
define('PACKAGE_DISABLED', 5);


// order status
define('UNASSIGNED', 0);
define('WAITING', 1);
define('STARTING', 2);
define('PICKED_UP', 3);
define('ORDER_DELIVERED', 4);
define('ORDER_DISABLED', 5);
define('ORDER_CANCELLED', 6);
define('FAILED_ORDER', 7);
define('ONWAY', 8);


// Payment status
define('NOT_PAID', 0);
define('PAID', 1);

// Tracking descripton
define('START', 'Start');
define('DRIVING', 'Driving to pickup');
define('DRIVED_PICKED_UP', 'Picked Up');
define('ONTHEWAY', 'On the way');
define('ITEMDELIVERED', 'Delivered');
define('FAILED_ITEM', 'Delivery failed');