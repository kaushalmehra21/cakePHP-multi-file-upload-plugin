<?php
namespace Library\View\Cell;

use Cake\View\Cell;

/**
 * FileOriginal cell
 */
class FileOriginalCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($id)
    {
        $url = 'library_docs/default.jpg';
        $palyer = '';
        $imageFormateArray = ['jpg', 'gif', 'png',];
        $audio_videoFormateArray = ['mp3', 'avi', 'asf', 'mov', 'flv', 'swf', 'mp4', 'wmv'];

        if ($id != null)
        {
            $this->loadModel('LibraryFiles');

            $libraryFiles = $this->LibraryFiles
            ->find()
            ->select(['name', 'title', 'extention'])
            ->where(['id' => $id])
            ->first();

            $url = 'library_docs/'.$libraryFiles->name.'.'.$libraryFiles->extention;
        }

        if (in_array($libraryFiles->extention, $imageFormateArray)) {
            $palyer = 'image';
        } 
        else if (in_array($libraryFiles->extention, $audio_videoFormateArray)) {
            $palyer = 'audio_video';
        } 
        else if ($libraryFiles->extention == 'pdf') {
            $palyer = 'pdf';
        } 
        else {
            $palyer = 'downloadable';
        }

        $this->set('url', $url);
        $this->set('title', $libraryFiles->title);
        $this->set('player', $palyer);
    }
}
