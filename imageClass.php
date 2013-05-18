<?php

// image class
// patryk 'jamzed' kuzmicz || www.varlog.pl || 2011.02.17

Class Image {

var $image;
var $crop_image;
var $image_x;
var $image_y;


public function load_image($path) {

	$this->image = getimagesize($path);
	$this->image_x = $this->image[0];
	$this->image_y = $this->image[1];

	if( $this->image_x <= 0 || $this->image_y <= 0 ) return false;

	$this->image['format'] = strtolower(preg_replace('/^.*?\//', '', $this->image['mime']));

	switch( $this->image['format'] ) {
            case 'jpg':
            case 'jpeg':
                $this->image_data = imagecreatefromjpeg($path);
            	break;
            case 'png':
                $this->image_data = imagecreatefrompng($path);
            	break;
            case 'gif':
                $this->image_data = imagecreatefromgif($path);
            	break;
            default:
                return false;
				break;
        }
}

public function crop($thumb_size = 650, $jpg_quality = 90) {

    if( $this->image_x > $this->image_y ) {
        $x_offset = ($this->image_x - $this->image_y) / 2;
        $y_offset = 0;
        $square_size = $this->image_x - ($x_offset * 2);
    } else {
        $x_offset = 0;
        $y_offset = ($this->image_y - $this->image_x) / 2;
        $square_size = $this->image_y - ($y_offset * 2);
    }

    $this->crop_image = imagecreatetruecolor($thumb_size, $thumb_size);

    if( imagecopyresampled( $this->crop_image, $this->image_data, 0, 0, $x_offset, $y_offset, $thumb_size, $thumb_size, $square_size, $square_size )) {
    } else {
        return false;
    }
}

public function colorize($method = 1) {
	switch( $method ) {
		case '1':
			imagefilter($this->crop_image, IMG_FILTER_COLORIZE, 30, -40, 10);
			imagefilter($this->crop_image,IMG_FILTER_GAUSSIAN_BLUR);
			break;
		case '2':
        	imagefilter($this->crop_image,IMG_FILTER_BRIGHTNESS,10);
	        imagefilter($this->crop_image,IMG_FILTER_BRIGHTNESS,-20);
	        imagefilter($this->crop_image,IMG_FILTER_COLORIZE,30,30,30);
	        imagefilter($this->crop_image,IMG_FILTER_COLORIZE,70,0,10);
	        imagefilter($this->crop_image,IMG_FILTER_COLORIZE,0,10,0);
	        imagefilter($this->crop_image,IMG_FILTER_COLORIZE,0,0,15);
	        imagefilter($this->crop_image,IMG_FILTER_CONTRAST,15);
	        imagefilter($this->crop_image,IMG_FILTER_BRIGHTNESS,-20);
			break;
	    case '3':
	        imagefilter($this->crop_image,IMG_FILTER_BRIGHTNESS,20);
	        imagefilter($this->crop_image,IMG_FILTER_COLORIZE, 30, -99, -35, 40);
	        imagefilter($this->crop_image,IMG_FILTER_GAUSSIAN_BLUR);
	        imagefilter($this->crop_image,IMG_FILTER_CONTRAST,10);
			break;
		case '4':
	        imagefilter($this->crop_image,IMG_FILTER_BRIGHTNESS,40);
	        imagefilter($this->crop_image,IMG_FILTER_BRIGHTNESS,-20);
	        imagefilter($this->crop_image,IMG_FILTER_COLORIZE, 10, -39, -85, 50);
	        imagefilter($this->crop_image,IMG_FILTER_CONTRAST,15);
	    	break;
		default:
			break;
	}
}

public function layer($mark = 1, $depth = 15) {

    switch($mark) {
        case 1:
            $watermark_file = "layers/layer_1.png";
            break;
        case 2:
            $watermark_file = "layers/layer_2.png";
            break;
        case 3:
            $watermark_file = "layers/layer_3.png";
            break;
		case 4:
			$watermark_file = "layers/layer_4.png";
			break;
        default:
			break;
    }

    $watermark = imagecreatefrompng($watermark_file);

    $watermark_width = 650;
    $watermark_height = 650;

    imagecopymerge($this->crop_image, $watermark, 0, 0, 0, 0, $watermark_width, $watermark_height, $depth);
    imagedestroy($watermark);
}

public function save_image($path) {
    imagejpeg($this->crop_image, $path);
    imagedestroy($this->crop_image);
}

}

?>
