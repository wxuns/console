<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/12/17
 * Time: 17:50.
 */

namespace Polite\Console;

class Command
{
    public static $defaultcommand = [
        \Polite\Console\Adapters\Version::class,
        \Polite\Console\Adapters\GetConfig::class,
        \Polite\Console\Adapters\Maker\MakeController::class,
        \Polite\Console\Adapters\Maker\MakeModel::class,
    ];

    public static function AddConsole()
    {
        Console::AddCommands(self::$defaultcommand);
    }
}
