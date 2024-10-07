<?php

namespace App\Models;

interface ValidatableModel
{
    public function getValidationRules(): array;
}
