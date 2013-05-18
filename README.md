PHPAgingPhotos
==============

PHP class for aging your photos.

Requirements:
- PHP + gd library


What we do
==========

- load your photo
- crop photo to 650×650px
- play with RGB palette 
- add a layer (texture)
- save your 'new' aged photo

Sample use with PHP
========

```
<?php

include('imageClass.php');

$imgobj = new Image();                    // create a new object
$imgobj->load_image("image_orig.jpg");    // load image
$imgobj->crop();                          // crop image
$imgobj->colorize(4);                     // colorize image (RGB modification) (predefined values 1-4)
$imgobj->layer(4,30);                     // put a layer on image (predefined 1-4, percentage)
$imgobj->save_image("foto.jpg");          // save aged image
```
