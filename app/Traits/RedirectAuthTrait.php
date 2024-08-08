<?php

namespace App\Traits;

trait RedirectAuthTrait
{
    public function redirectTo() {
        return route('shop.index');
    }
}
