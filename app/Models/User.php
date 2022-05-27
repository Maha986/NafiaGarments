<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'o_auth',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForWhatsApp()
    {
        $id = auth()->user()->id;

        $user_contact = Billing::where('user_id',$id)->orderBy('id','desc')->get()->first();

        return $user_contact->contact;
    }

    public function customers(){

        return $this->belongsToMany(Customer::class);
    }

    public function resellers(){

        return $this->belongsToMany(Reseller::class);
    }

    public function salecenters(){

        return $this->belongsToMany(SaleCenter::class);
    }

    public function riders(){

        return $this->belongsToMany(Rider::class);
    }

    public function owners(){

        return $this->belongsToMany(Owner::class);
    }
}
