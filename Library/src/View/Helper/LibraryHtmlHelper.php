<?php
namespace Library\View\Helper;

use Cake\View\Helper;

class LibraryHtmlHelper extends Helper
{
    public function video($name, $option = false)
    {
    	pr($option);


    	$url 		= 'http://localhost/cake_edu/plugins/library/'; // make it dynemic

		$width 	= (isset($option['width']) && $option['width']!='') ? $option['width'] : 320;
    	$height = (isset($option['height']) && $option['height']!='') ? $option['height'] : 240;
    	$controls = (in_array('controls', $option)) ? 'controls="controls"' : '';
    	$autoplay = (in_array("autoplay", $option)) ? 'autoplay="autoplay"' : '';

    	$return = '<video width="'.$width.'" height="'.$height.'" '.$autoplay.' '.$controls.'>';
		$return .= '<source src="'.$url.$name.'" type="video/mp4">';
		$return .= 'Your browser does not support the video tag.';
		$return .= '</video>';

    	return $return;
    }
}