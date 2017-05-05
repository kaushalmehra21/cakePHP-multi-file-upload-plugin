<?php 
if ($player == 'image') {
	echo $this->Html->image($url, ['fullBase'=>true, 'alt'=>$title]);
} else if ($player == 'audio_video') {
	echo $this->Html->media([$url], ['autoplay', 'controls', 'pathPrefix'=>'img/', 'fullBase'=>true, 'alt'=>$title]);
} else {
	echo $this->Html->link('Download File Here','/img/'.$url,['class'=>'button', 'target'=>'_blank', 'download']);
}
?>