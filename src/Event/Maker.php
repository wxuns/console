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

    public function buildFile()
    {
        if ($this->type == 'controllers'){
            $arr = explode('/',$this->filename);
            if (!strpos($this->filename,'/')){
                $controllerPath = $this->application . '/app/controllers/' . $this->filename . '.php';
            }else{
                $controllerPath = $this->application . '/app/modules/' . $arr[0] . '/controllers/' . $arr[1] . '.php';
            }
            if (!file_exists($controllerPath)){
                if (!is_dir(dirname($controllerPath))){
                    mkdir(dirname($controllerPath),0777,true)?:function(){
                        exit();
                    };
                }
                return file_put_contents($controllerPath,
                    "<?php\n\nclass " . $arr[count($arr)-1] . "Controller extends Yaf\Controller_Abstract {\n\n}");
            }
            return false;
        }
    }
}