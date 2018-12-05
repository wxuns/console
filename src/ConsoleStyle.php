<?php
/**
 * Created by PhpStorm.
 * Author: wxuns <wxuns@wxuns.cn>
 * Link: http://wxuns.cn
 * Date: 2018/10/20
 * Time: 11:46.
 */

namespace Polite\Console;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ConsoleStyle extends SymfonyStyle
{
    private $input;

    public function __construct(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        parent::__construct($input, $output);
    }

    public function configTable($config)
    {
        dump($config);
    }
}
