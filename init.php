<?php
define('ROOT', 'D:\Fon\VII\Internet tehnologije\PHP-AJAX-MYSQL\\');

spl_autoload_register(function($className) {
    $directories = array('controller/','model/','common/');
    foreach ($directories as $directory) {

        if (file_exists(ROOT . $directory . $className . '.php')) {
            include ROOT . $directory . $className . '.php';
            return;
        }
    }
});