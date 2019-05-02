<?php


namespace App\Service;


use Symfony\Component\Lock\Factory;
use Symfony\Component\Lock\Store\FlockStore;

class TestService
{
    public function someMethod()
    {
        $store = new FlockStore(sys_get_temp_dir());
        $factory = new Factory($store);

        $lock = $factory->createLock('MY_SERVICE');

        if ($lock->acquire()) {

            sleep(20);

            return 'SERVICE_OUTPUT';
        }

        return 'SERVICE_RUNNING';
    }
}