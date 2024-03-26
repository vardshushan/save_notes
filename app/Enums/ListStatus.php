<?php

namespace App\Enums;


use Illuminate\Validation\Rules\Enum;

final class ListStatus extends Enum
{
    const PENDING = 'pending';
    const COMPLETED = 'completed';
}
