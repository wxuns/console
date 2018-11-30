<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/11/22
 * Time: 17:04
 */

namespace Polite\Console\Config;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class Config extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            // ��������֣�"bin/console" ����Ĳ��֣�
            ->setName('config:get')

            // the short description shown while running "php bin/console list"
            // ���� "php bin/console list" ʱ�ļ������
            ->setDescription('Show all or one configuration')

            // the full command description shown when running the command with
            // the "--help" option
            // ��������ʱʹ�� "--help" ѡ��ʱ��������������
            ->setHelp("Show all or one configuration")
            ->addArgument('pathname', InputArgument::REQUIRED, 'config path name.')
            ->addArgument('configname', InputArgument::OPTIONAL, 'config name.')
        ;
    }

    protected function execute(InputInterface $input,OutputInterface $output)
    {
        $pathname = $input->getArgument('pathname');
        $configname = $input->getArgument('configname');
        $config = new \Polite\Console\Event\Config();

        if($ini = $config->getConfig($pathname,$configname)){
            if (is_string($ini)){
                $output->writeln(
                    "<info>$configname '=>' $ini</info>");
            }else{
                dump($ini);
//                foreach ($ini as $k=>$v){
//                    dump($v);
//                }
            }
        }else{
            $output->writeln(
                '<error>this config non-existent</error>');
        }
    }
}