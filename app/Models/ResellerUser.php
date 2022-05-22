<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerUser extends Model
{
    use HasFactory;

    protected $table = 'reseller_user';

    protected $guarded = [];
}
