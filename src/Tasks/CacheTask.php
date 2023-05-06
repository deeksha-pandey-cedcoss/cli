<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

use Phalcon\Acl\Adapter\Memory;

class   CacheTask extends Task
{
    public function mainAction()
    {
        $di = $this->getDI();
        $acl = new Memory();

        $acl->addRole('manager');
        $acl->addRole('accounting');
        $acl->addRole('guest');
        $acl->addComponent(
            'admin',
            [
                'dashboard',
                'users',
                'view',
            ]
        );

        $acl->addComponent(
            'reports',
            [
                'list',
                'add',
                'view',
            ]
        );

        $acl->allow('manager', 'admin', 'users');
        $acl->allow('manager', 'reports', ['list', 'add']);
        

        $di->get('cache')->set('key5', serialize($acl));

        echo 'This is the default task and the default action' . PHP_EOL;
    }
    public function createAction()
    {

        $di = $this->getDI();
        $di->get('cache')->set('key1', 'deeksha');

        echo 'Cache file is created' . PHP_EOL;
    }
    public function deleteAction()
    {

        $folder = BASE_PATH . 'cache/ph-strm/ke';
        $dh = opendir($folder);
        while (($file = readdir($dh)) !== false) {
            if (!preg_match('/^[.]/', $file)) { // do some sort of filtering on files
                $path = $folder . DIRECTORY_SEPARATOR . $file;
                unlink($path); // remove it
            }
        }

        echo 'Cache file is removed ' . PHP_EOL;
    }
}
