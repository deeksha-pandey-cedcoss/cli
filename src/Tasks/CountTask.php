<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class CountTask extends Task
{
    public function mainAction()
    {
        echo 'This is the default task and the default action' . PHP_EOL;
    }
    public function countAction()
    {
        $robots = $this->db->fetchAll(
            "SELECT COUNT(*) as count FROM products WHERE stock<=10",
            \Phalcon\Db\Enum::FETCH_ASSOC
        );

        print_r($robots[0]['count']);
    }
}
