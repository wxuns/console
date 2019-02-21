<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/10/24
 * Time: 11:34.
 */

namespace Polite\Console\Event;

class Maker
{
    public $type = 'controller';
    public $filename = '';
    protected $application = '';

    public function __construct($type, $filename)
    {
        $this->type = $type;
        $this->filename = $filename;
        $this->application = BASE_PATH;
    }

    /**
     * make file.
     *
     * @return bool|int
     */
    public function buildFile()
    {
        $arr = explode('/', $this->filename);
        throw_unless(method_exists(self::class,$this->type),'The console not find');
        $func = $this->type;
        return $this->$func($arr);
    }

    /**
     * make controller
     * @param $arr
     * @return bool|int
     */
    public function controller($arr)
    {
        if (!strpos($this->filename, '/')) {
            $controllerPath = $this->application.'/app/controllers/'.$this->filename.'.php';
        } else {
            $controllerPath = $this->application.'/app/modules/'.$arr[0].'/controllers/'.$arr[1].'.php';
        }

        return $this->writeFile($controllerPath,
            "<?php\n\nclass ".$arr[count($arr) - 1]."Controller extends BaseController \n{\n\n}");
    }

    /**
     * make models
     * @param $arr
     * @return bool|int
     */
    public function models($arr)
    {
        $modelPath = $this->application.'/app/models/'.$this->filename.'.php';

        return $this->writeFile($modelPath,
            "<?php\n\n".(count($arr) > 1 ? 'namespace '.$arr[0].";\n" : '')
            .'class '.$arr[count($arr) - 1]
            ."Model extends \Illuminate\Database\Eloquent\Model \n{\n\n}");
    }

    /**
     * make console file
     * @param $arr
     * @return bool|int
     */
    public function console($arr)
    {
        $consolePath = $this->application.'/app/library/Console/'.$this->filename.'.php';
        $res = implode('\\',$arr);
        $namespace = count($arr)>1?"App\\Console\\".substr($res,0,strrpos($res,'\\')):'App\\Console';
        $class = trim(substr($res,strrpos($res,'\\')),'\\');
        $content = <<<PHP
<?php

namespace $namespace;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class $class extends Command
{
    protected function configure()
    {
        \$this
            ->setName('console:example')
            ->setDescription('Create a console example')
            ->setHelp('Create a console example');
    }

    protected function execute(InputInterface \$input, OutputInterface \$output)
    {
        \$output->writeln([
            '<info>Console example</info>',
        ]);
    }
}

PHP;

        return $this->writeFile($consolePath,$content);
    }

    /**
     * create file and write file
     * @param $path
     * @param $content
     * @return bool|int
     */
    public function writeFile($path, $content)
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
