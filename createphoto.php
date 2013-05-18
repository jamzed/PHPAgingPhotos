<?php

// sample script || http://www.varlog.pl/2011/02/efekt-starego-zdjecia-w-php-gd/
// patryk 'jamzed' kuzmicz || www.varlog.pl || 2011.02.17

include('imageClass.php');

$imgobj = new Image();
$imgobj->load_image("image_orig.jpg");
$imgobj->crop();
$imgobj->colorize(1);
$imgobj->layer(1,40);
$imgobj->save_image("foto.jpg");

