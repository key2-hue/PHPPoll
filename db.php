<?php

ini_set('display_errors',1);

define('DATABASE_USERNAME','dbuser');
define('DATABASE_PASSWORD','keymaeda2');
define('DATABASE_NAME','poll_git_php');
define('DSN','mysql:dbhost=localhost;unix_socket=/tmp/mysql.sock;dbname='.DATABASE_NAME);

session_start();

require_once(__DIR__ . '/functions.php');