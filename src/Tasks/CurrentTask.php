<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class CurrentTask extends Task
{
    public function mainAction()
    {
        echo 'This is the default task and the default action' . PHP_EOL;
    }
    public function orderAction()
    {
        $date=date("Y-m-d");
        $robots = $this->db->fetchAll(
            "SELECT * FROM `orders` WHERE `date`='$date'",
            \Phalcon\Db\Enum::FETCH_ASSOC
        );

        print_r($robots);
    }
}


