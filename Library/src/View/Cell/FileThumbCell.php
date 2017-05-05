<?php
namespace Library\View\Cell;

use Cake\View\Cell;

/**
 * FileThumb cell
 */
class FileThumbCell extends Cell
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
        $thumbUrl = 'library_docs/thumb/default.jpg';
        $FormateArray = ['jpg', 'gif', 'png', 'avi', 'asf', 'mov', 'flv', 'swf', 'mp4', 'wmv']; // formate selected

        if ($id != null)
        {
            $this->loadModel('LibraryFiles');

            $libraryFiles = $this->LibraryFiles
            ->find()
            ->select(['name', 'extention'])
            ->where(['id' => $id])
            ->first();

            if($libraryFiles->name != null && in_array($libraryFiles->extention, $FormateArray)){
                $thumbUrl = 'library_docs/thumb/'.$libraryFiles->name.'.jpg';
            } else if ($libraryFiles->extention == 'pdf') {
                $thumbUrl = 'library_docs/thumb/default-pdf.jpg';
            } else {
                $thumbUrl = 'library_docs/thumb/default-file.jpg';
            }
        }

        $this->set('thumb_url', $thumbUrl);
    }
}
