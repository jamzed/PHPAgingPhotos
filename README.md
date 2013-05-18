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
$imgobj = new Image();
$imgobj->load_image("image_orig.jpg");
$imgobj->crop();
$imgobj->colorize(4);
$imgobj->layer(4,30);
$imgobj->save_image("foto.jpg");
```
