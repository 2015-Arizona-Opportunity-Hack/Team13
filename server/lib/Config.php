<?php

//Database Constants
//defined('DATABASE') ? null : define("DATABASE", "pgsql");
defined('DATABASE') ? null : define("DATABASE", "mysql");
defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER') ? null : define("DB_USER", "root");
defined('DB_PASS') ? null : define("DB_PASS", "root");
defined('DB_NAME') ? null : define("DB_NAME", "opportunity");

define('DS', DIRECTORY_SEPARATOR);
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'Opportunity-Hack'.DS.'server');
define('LOCAL_SECRET', 'QP/4BrtgrkmJQ3c2RsIHKxnM2I0b4kbp1sOa+zO8pjliTVZqw/r4Ehg4GP0fBXvSKS4GljDAjJUinfH0keoGeywpjZtZ9PiCmScX7K8YyVO/40X9NlvYDeY9nPqm70ZI+auazyZ9ztKlvnmTcBVXU9BgL1LWlxJO9B4M2HLznrU=')

?>
