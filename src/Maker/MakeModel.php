<?php
/**
 * Created by PhpStorm.
 * Author: wxuns <wxuns@wxuns.cn>
 * Link: http://wxuns.cn
 * Date: 2018/10/17
 * Time: 21:00
 */

namespace Polite\Console\Maker;

use Polite\Console\Event\Maker;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class MakeModel extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            // 命令的名字（"bin/console" 后面的部分）
            ->setName('make:model')
            // the short description shown while running "php bin/console list"
            // 运行 "php bin/console list" 时的简短描述
            ->setDescription(' Create a new model file')

            // the full command description shown when running the command with
            // the "--help" option
            // 运行命令时使用 "--help" 选项时的完整命令描述
            ->setHelp("This command allows you to create model file")
            ->addArgument('models', InputArgument::REQUIRED, 'models name.')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $maker = new Maker('models',$input->getArgument('models'));
        $output->writeln($maker->buildFile()?
            '<info>model:' . $input->getArgument('models') . ' create success</info>':
            '<error>model:' . $input->getArgument('models') . ' has already</error>');
    }
}