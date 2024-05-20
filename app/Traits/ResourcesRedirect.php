<?php

namespace App\Traits;

trait ResourcesRedirect
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}