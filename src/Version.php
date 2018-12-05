<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/10/12
 * Time: 11:31.
 */

namespace Polite\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zend\Text\Figlet\Figlet;

class Version extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            // 命令的名字（"bin/console" 后面的部分）
            ->setName('version')

            // the short description shown while running "php bin/console list"
            // 运行 "php bin/console list" 时的简短描述
            ->setDescription('Show version')

            // the full command description shown when running the command with
            // the "--help" option
            // 运行命令时使用 "--help" 选项时的完整命令描述
            ->setHelp('Show version');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $flf = realpath(dirname(__FILE__).'/../flf');
        $figlet = new Figlet([
            'font'=> $flf.'/digital.flf',
        ]);
        $output->writeln([
            $figlet->render('Polite'),
            '<info>Polite version v1.2.0 2018.10.16 21:31:30</info>',
        ]);
    }
}
