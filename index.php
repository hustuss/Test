<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
<?php
       
       

$imagick = new Imagick(); 
print_r($imagick);

$imagick->readImage('logo.jpg'); 
$imagick->rotateImage(new ImagickPixel('none'), -13.55);
$imagick->writeImage('my_rotated.jpg'); 


?>

    </body>
</html>
