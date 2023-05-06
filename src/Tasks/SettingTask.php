<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class SettingTask extends Task
{
    public function mainAction()
    {
        echo 'This is the default task and the default action' . PHP_EOL;
    }
    public function defaultAction($price, $stock)
    {
        $robots = $this->db->fetchAll(
            "SELECT * FROM settings",
            \Phalcon\Db\Enum::FETCH_ASSOC
        );

        if (isset($robots[0])) {
            $this->db->execute(
                "UPDATE `settings` SET `price`=$price , `stock`=$stock "
            );
        } else {
            $this->db->execute(
                "INSERT INTO `settings`(`price`, `stock`) VALUES ($price,$stock)"
            );
        }

        echo 'Settings are updated ' . PHP_EOL;
    }
}
