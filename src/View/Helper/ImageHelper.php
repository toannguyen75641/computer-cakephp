<?php
namespace App\View\Helper;

use Cake\View\Helper;

class ImageHelper extends Helper 
{
	public $helpers = array('Html');
	public $cacheDir = 'uploads/resize'; // relative to 'img'.DS

	public function resize($path, $width, $height, $aspect = true, $htmlAttributes = array(), $return = false) 
	{
		$types = array(1 => "gif", "jpeg", "png"); // used to determine image type

		$uploadsDir = 'img';

		$fullpath = WWW_ROOT.$uploadsDir.DS;
		$url = WWW_ROOT.$path;

		$size = getimagesize($url);

		if ($aspect) {
			if (($size[1]/$height) > ($size[0]/$width))  // $size[0]:width, [1]:height, [2]:type
				$width = ceil(($size[0]/$size[1]) * $height);
			else
				$height = ceil($width / ($size[0]/$size[1]));
		}

		$relfile = '/'.$uploadsDir.'/'.$this->cacheDir.'/'.basename($path); // relative file
		$cachefile = $fullpath.$this->cacheDir.DS.basename($path);  // location on server

		if (file_exists($cachefile)) {
			$csize = getimagesize($cachefile);
			$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
			if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
				$cached = false;
		} else {
			$cached = false;
		}

		if (!$cached) {
			$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
		} else {
			$resize = false;
		}

		if ($resize) {
			$image = call_user_func('imagecreatefrom'.$types[$size[2]], $url);
			if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) {
				imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			} else {
				$temp = imagecreate ($width, $height);
				imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			}
			call_user_func("image".$types[$size[2]], $temp, $cachefile);
			imagedestroy ($image);
			imagedestroy ($temp);
		} 

		return $this->Html->image($relfile, $htmlAttributes);
    }
}
