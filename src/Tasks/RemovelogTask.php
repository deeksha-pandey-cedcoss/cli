<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class RemovelogTask extends Task
{
    public function mainAction()
    {
        echo 'This will remove log files.' . PHP_EOL;
    }
    public function removeAction()
    {

        $folder = BASE_PATH . 'Tasks/logs/';
        $dh = opendir($folder);
        while (($file = readdir($dh)) !== false) {
            if (!preg_match('/^[.]/', $file)) { // do some sort of filtering on files
                $path = $folder . DIRECTORY_SEPARATOR . $file;
                unlink($path); // remove it
            }
            echo 'logs will be removed from here' . PHP_EOL;
        }
    }
}
