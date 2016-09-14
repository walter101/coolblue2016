<?php

defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER') ? null : define("DB_USER", "xxx");
defined('DB_PASS') ? null : define("DB_PASS", "xxx");
defined('DB_NAME') ? null : define("DB_NAME", "xxx");

defined('ROOTDIR') ? null : define('ROOTDIR','/home/waltepf108/domains/walterpothof.nl/public_html/coolblue/');

// Load all objects
require_once "includes/database.php";
require_once "includes/tablet.php";
require_once "includes/object_list.php";
require_once "includes/session.php";
require_once "includes/filter.php";
require_once "includes/winkelwagen.php";
