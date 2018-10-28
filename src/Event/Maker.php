<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/10/24
 * Time: 11:34
 */

namespace Polite\Console\Event;

class Maker
{
    public $type = 'controllers';
    public $filename = '';
    protected $application = '';

    public function __construct($type,$filename)
    {
        $this->type = $type;
        $this->filename = $filename;
        $this->application = realpath(dirname(__FILE__) . '/../../../../../');
    }

    /**
     * make file
     * @return bool|int
     */
    public function buildFile()
    {
        $arr = explode('/',$this->filename);
        if ($this->type == 'controllers'){
            if (!strpos($this->filename,'/')){
                $controllerPath = $this->application . '/app/controllers/' . $this->filename . '.php';
            }else{
                $controllerPath = $this->application . '/app/modules/' . $arr[0] . '/controllers/' . $arr[1] . '.php';
            }
            return $this->writeFile($controllerPath,
                "<?php\n\nclass " . $arr[count($arr)-1] . "Controller extends Yaf\Controller_Abstract \n{\n\n}");
        }elseif ($this->type == 'models'){
            $modelPath = $this->application . '/app/models/' . $this->filename . '.php';

            return $this->writeFile($modelPath,
                "<?php\n\n" . (count($arr)>1?'namespace ' . $arr[0] . ";\n" : '')
                    . "class " . $arr[count($arr)-1] 
                    . "Model extends \Illuminate\Database\Eloquent\Model \n{\n\n}");
        }
    }
    public function writeFile($path,$content)
    {
        if (!file_exists($path)) {
            if (!is_dir(dirname($path))) {
                mkdir(dirname($path), 0777, true) ?: function () {
                    exit();
                };
            }
            return file_put_contents($path, $content);
        }
        return false;
    }
}