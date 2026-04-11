<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

abstract class ModelIndonesiaSoftDelete extends ModelIndonesia
{
    use SoftDeletes;
}
