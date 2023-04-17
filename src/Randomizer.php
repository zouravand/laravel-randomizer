<?php

namespace Tedon\LaravelRandomizer;

use Illuminate\Support\Arr;

class Randomizer
{
    public function generate(?int $length = null, ?string $type = null): string
    {
        if (is_null($length))
            $length = config('laravel-randomizer.default.length', 10);
        if (is_null($type))
            $type = config('laravel-randomizer.default.type', 'string');

        $characters = match ($type) {
            'string' => array_merge(range('a', 'z'), range(0, 9)),
            'alphabet' => range('a', 'z'),
            'persian' => [
                'ا', 'ب', 'پ', 'ت', 'ث', 'ج', 'چ', 'ح', 'خ', 'د', 'ذ', 'ر', 'ز', 'ژ', 'س', 'ش', 'ص',
                'ض', 'ط', 'ظ', 'ع', 'غ', 'ف', 'ق', 'ک', 'گ', 'ل', 'م', 'ن', 'و', 'ه', 'ی',
            ],
            'number' => range(0, 9),
        };

        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= Arr::random($characters);
        }
        return $randomString;
    }

    public function string(?int $length = null): string
    {
        return $this->generate($length, 'string');
    }

    public function alphabet(?int $length = null): string
    {
        return $this->generate($length, 'alphabet');
    }

    public function persian(?int $length = null): string
    {
        return $this->generate($length, 'persian');
    }

    public function number(?int $length = null): string
    {
        return $this->generate($length, 'number');
    }

    public function nationalId(): string
    {
        return $this->number(10);
    }

    public function mobile(): string
    {
        return '0999' . $this->number(7);
    }

    public function iban(): string
    {
        return 'IR' . $this->number(24);
    }

    public function cardNumber(): string
    {
        return $this->number(16);
    }

    public function email(): string
    {
        return $this->string() . '@' . config('laravel-randomizer.base_url', 'example.com');
    }

    public function url(): string
    {
        return 'https://' . $this->string(3) . '.' . config('laravel-randomizer.base_url', 'example.com') . '/' . $this->string(24);
    }
}