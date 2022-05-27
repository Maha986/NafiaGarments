<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleCenterUser extends Model
{
    use HasFactory;

    protected $table = 'sale_center_user';

    protected $guarded = [];
}
