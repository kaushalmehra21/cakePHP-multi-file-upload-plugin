<?php
namespace Library\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * FileNameHander component
 */
class FileNameHandlerComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    //protected $_defaultConfig = [];

    public function generateRandName($segment_chars = 10)
    {
        $tokens     = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@$[]()-_0123456789';
        $rand_name  = '';
    
        for ($j = 0; $j < $segment_chars; $j++) {
            $rand_name .= $tokens[rand(0, strlen($tokens)-1)];
        }
    
        return $rand_name;
    }

    public function fileNameHandlerFunction($file_name) {

        $rand_str = $this->generateRandName();
        $exp_file_name = explode('.', $file_name);
        $ext = end($exp_file_name);                     // get file ext
        $base_name = str_replace('.' . $ext, '', $file_name);      // get the file base name
        $rand_name = $rand_str . '.' . $ext;       // generate file rand name
        
        return array(
                "base_name"     => $base_name,
                "ext"           => strtolower($ext),
                "rand_str"      => $rand_str,
                "rand_name"     => $rand_name
            );
    }
}
