<?php
/**
 * Flow-Flow
 *
 * Plugin class. This class should ideally be used to work with the
 * public-facing side of the WordPress site.
 *
 * If you're interested in introducing administrative or dashboard
 * functionality, then refer to `FlowFlowAdmin.php`
 *
 * @package   FlowFlow
 * @author    Looks Awesome <email@looks-awesome.com>

 * @link      http://looks-awesome.com
 * @copyright 2014-2016 Looks Awesome
 */
define('FF_PLUGIN_URL', 'http://127.0.0.1/site');
define('FF_AJAX_URL',   'http://127.0.0.1/site/flow-flow/ff.php');

define('DB_HOST', '127.0.0.1:3306');
define('DB_NAME','DB');//DB NAME
define('DB_USER', 'USER');//DB USER NAME
define('DB_PASSWORD', 'PASSWORD');//DB PASSWORD

define('DB_CHARSET','utf8');
define('DB_COLLATE','utf8_general_ci');
define('DB_TABLE_PREFIX', '');//TABLE PREFIX

define('FF_LOCALE', 'en_US');
//date_default_timezone_set('America/New_York');

define('WP_CONTENT_DIR', 'path to the root of the site');