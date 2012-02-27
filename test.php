<?php
error_reporting(E_ALL);
$imagick = new Imagick(); 
$imagick->readImage('qrcode.jpg'); 
//$imagick->rotateImage(new ImagickPixel('none'), -13.55);
$imagick->scaleImage(100,100);
$imagick->writeImage('qrcode.jpg'); 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
