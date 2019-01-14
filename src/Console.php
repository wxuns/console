<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2019/1/11
 * Time: 15:36.
 */

namespace Polite\Console;

use Symfony\Component\Console\Application;

class Console
{
    public static function AddCommands($command = [])
    {
        $application = new Application();
        foreach ($command as $comm) {
            $application->add(new $comm());
        }
        $application->run();
    }
}
