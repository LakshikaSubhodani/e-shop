<?php

/**
 * 
 */
$con =  mysqli_connect('localhost', 'root', '', 'eshop');

if (!$con) {
    die(mysqli_connect_error());
}
