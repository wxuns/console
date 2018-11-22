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
            ->addArgument('configname', InputArgument::REQUIRED, 'config name.')
        ;
    }

    protected function execute(InputInterface $input,OutputInterface $output)
    {
        if ($pathname = $input->getArgument('pathname')){
            $config = new \Polite\Console\Event\Config();
            var_dump($config->getConfig($pathname));
        }else{

        }
    }
}