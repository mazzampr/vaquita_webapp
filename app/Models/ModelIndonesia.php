<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kra8\Snowflake\HasSnowflakePrimary;

abstract class ModelIndonesia extends Model
{
    use HasSnowflakePrimary;

    protected $guarded = [];
}
