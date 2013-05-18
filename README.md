PHPAgingPhotos
==============

PHP class for aging your photos

Requirements:
- PHP + gd library


what we do
==========

1. load your photo
2. crop photo to 650×650px
3. play with RGB palette 
4. add a layer (texture)
5. save your 'new' aged photo

PHP code
========

<?php
include('imageClass.php');
 
$imgobj = new Image();
$imgobj->load_image("image_orig.jpg");
$imgobj->crop();
$imgobj->colorize(4);
$imgobj->layer(4,30);
$imgobj->save_image("foto.jpg");
