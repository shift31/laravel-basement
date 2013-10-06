<?php


namespace Shift31\LaravelBasement\Facades;


use Illuminate\Support\Facades\Facade;


class Basement extends Facade {

    protected static function getFacadeAccessor() { return 'basement'; }
}