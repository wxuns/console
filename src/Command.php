<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/12/17
 * Time: 17:50
 */

namespace Polite\Console;


use Symfony\Component\Console\Application;

class Command
{
    static public $defaultcommand = [
        '\Polite\Console\Adapters\Version',
        '\Polite\Console\Adapters\Config',
        '\Polite\Console\Adapters\Maker\MakeController',
        '\Polite\Console\Adapters\Maker\MakeModel'
    ];
    public $application = '';

    public function __construct($command)
    {
        $this->application = new Application();
        $this->application->addCommands(new self::$defaultcommand);
    }
}