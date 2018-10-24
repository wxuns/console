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
    public $type = 'controller';
    public $filename = '';

    public function __construct($type,$filename)
    {
        $this->type = $type;
        $this->filename = $filename;

        return $this->buildFile();
    }

    public function buildFile()
    {
        print_r( __DIR__);
    }
}