<?php


namespace Shift31\LaravelBasement\Facades;


use Illuminate\Support\Facades\Facade;


class Cb extends Facade {

    protected static function getFacadeAccessor() { return 'basement'; }
}