<?php
/**
 * Created by PhpStorm.
 * Author: wxuns <wxuns@wxuns.cn>
 * Link: http://wxuns.cn
 * Date: 2018/9/25
 * Time: 21:31.
 */

namespace Polite\Console;

class Commands
{
    public static function Commands()
    {
        $commit = [
            new \Polite\Console\Adapters\Version(),
            new \Polite\Console\Adapters\Config(),
            new \Polite\Console\Adapters\Maker\MakeController(),
            new \Polite\Console\Adapters\Maker\MakeModel(),
        ];

        return $commit;
    }
}
