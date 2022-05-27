<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerUser extends Model
{
    use HasFactory;

    protected $table = 'owner_user';

    protected $guarded = [];
}
