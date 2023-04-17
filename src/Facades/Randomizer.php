<?php

namespace Tedon\LaravelRandomizer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string(?int $length = null): string
 * @method static alphabet(?int $length = null): string
 * @method static persian(?int $length = null): string
 * @method static number(?int $length = null): string
 * @method static nationalId(): string
 * @method static mobile(): string
 * @method static iban(): string
 * @method static cardNumber(): string
 * @method static email(): string
 * @method static url(): string
 */
class Randomizer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-randomizer';
    }
}