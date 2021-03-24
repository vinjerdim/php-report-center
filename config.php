<?php

$root = pathinfo($_SERVER['SCRIPT_FILENAME']);
define('BASE_FOLDER', basename(dirname(__FILE__)));
define('SITE_ROOT', realpath(dirname(__FILE__)));
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . BASE_FOLDER);
