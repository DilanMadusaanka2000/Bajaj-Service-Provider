<?php

namespace domain\Facades;

use domain\Services\Inventory;
use Illuminate\Support\Facades\Facade;

class InventoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Inventory::class;
    }
}
