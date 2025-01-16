<?php


return[
    'driver' => env('IMAGES_DRIVER', 'gd'),
    'upload_path' => env('IMAGES_UPLOAD_PATH', '/uploads'),
    'access_path' => env('IMG_PATH', 'http:http://127.0.0.1:8000/sp/dashboard/inventrory/form/uploads'),




    1 => ['width' => 35, 'height' => 35],
    2 => ['width' => 100, 'height' => 100],
    3 => ['width' => 300, 'height' => 300],
    4 => ['width' => 600, 'height' => 400], // Example for landscape ratio
    5 => ['width' => 400, 'height' => 600], // Example for portrait ratio


];


?>
