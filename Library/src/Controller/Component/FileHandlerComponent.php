<?php
namespace Library\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * FileHandler component
 */
class FileHandlerComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    
    // The other component your component uses
    public $components = ['Library.FileNameHandler'];

    private $imageFormateArray = ['jpg', 'gif', 'png']; // formate selected
    private $videoFormateArray = ['avi', 'asf', 'mov', 'flv', 'swf', 'mp4', 'wmv'];

    /**
     */
    public function uploadFile($file = null, $destination = 'library_docs')
    {
        $return             = ['status'=>'fail', 'message'=>'File Upload Fail.'];
        $destinationPath    = WWW_ROOT.'img/'.$destination;

        if(!file_exists($destinationPath))
            mkdir($destinationPath, 0777, true);
        
    	if($file != null)
    	{

            $FileNameHandler = $this->FileNameHandler->fileNameHandlerFunction($file['name']);
            $filePath = $destinationPath.'/'.$FileNameHandler['rand_name'];

    		if(move_uploaded_file($file['tmp_name'], $filePath))
            {
                $return['status']   = 'success';
                $return['message']  = 'File Uploaded Succesfully.';
                $return['new_name'] = $FileNameHandler['rand_str'];
                $return['ext']      = $FileNameHandler['ext'];
                $return['name']     = $FileNameHandler['base_name'];
                $return['type']     = $file['type'];
                $return['size']     = $file['size'];
                $return['error']    = $file['error'];

                $data = $this->createThumb($destinationPath, $FileNameHandler);
                
            }
    	}
    	else
    	{
    		$return['message'] 	= 'Please select at least one File.';
    	}

    	return $return;
    }


    /**
     */
    public function createThumb($sourcePath, $FileNameHandler)
    {
        if(!file_exists($sourcePath.'/thumb')) {
            mkdir($sourcePath.'/thumb', 0777, true);
        }

        $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
        $dimention = '150x150';
        $getFromSecond = 1;
        $thumbFilePath = $sourcePath.'/'.$FileNameHandler['rand_name'];
        $thumbDestinationPath = $sourcePath.'/thumb/'.$FileNameHandler['rand_str'].'.jpg';

        

        /* Get File Type */
        if ( in_array($FileNameHandler['ext'], $this->imageFormateArray) )
        {
            
            $cmd = "$ffmpeg -i $thumbFilePath -vf scale=$dimention $thumbDestinationPath";
            shell_exec($cmd);

        }
        else if ( in_array($FileNameHandler['ext'], $this->videoFormateArray) )
        {
            
            $cmd = "$ffmpeg -i $thumbFilePath -an -ss $getFromSecond -s $dimention $thumbDestinationPath";
            shell_exec($cmd);
        }
    }
}