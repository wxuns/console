<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2019/2/20
 * Time: 15:05.
 */

namespace Polite\Console\Adapters\Maker;

use Polite\Console\Event\Maker;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeConsole extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            // 命令的名字（"bin/console" 后面的部分）
            ->setName('make:console')
            // the short description shown while running "php bin/console list"
            // 运行 "php bin/console list" 时的简短描述
            ->setDescription(' Create a new console file')

            // the full command description shown when running the command with
            // the "--help" option
            // 运行命令时使用 "--help" 选项时的完整命令描述
            ->setHelp('This command allows you to create console file')
            ->addArgument('console', InputArgument::REQUIRED, 'console name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $maker = new Maker('console', $input->getArgument('console'));
        $output->writeln($maker->buildFile() ?
            '<info>console:'.$input->getArgument('console').' create success</info>' :
            '<error>console:'.$input->getArgument('console').' has already</error>');
    }
}
