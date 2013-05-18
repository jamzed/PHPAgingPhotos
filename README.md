PHPAgingPhotos
==============

Simple PHP class for aging your photos.

Requirements:
- PHP + gd library


What we gonna do
==========

- load a photo
- crop a photo to 650×650px
- play with RGB palette 
- add a layer (texture)
- save 'new' aged photo

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

Result
=======

This is an original image (image_orig.jpg)
![Original image](https://raw.github.com/jamzed/PHPAgingPhotos/master/image_orig.jpg)

```
$imgobj->colorize(2);
$imgobj->layer(2,20);
```

should create a photo like this one:

![Sample aged photo](http://www.varlog.pl/wp-content/uploads/2011/02/foto_layer_2_colorize_2_20.jpg)


```
$imgobj->colorize(4);
$imgobj->layer(4,30);
```

gives you that effect:

![Sample aged photo](http://www.varlog.pl/wp-content/uploads/2011/02/foto_layer_4_colorize_4_30.jpg)

enjoy!
