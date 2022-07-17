<?php

namespace App\Models;

use App\Models\Announcement;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }
    public function favouriteAnnouncements(){
        return $this->belongsToMany(Announcement::class);
    }
    public function getAcceptedAnnouncement(){
        return $this->announcements()->where('is_accepted',true)->count();
    }
    public function cartItem(){
        
        return $this->belongsToMany(Announcement::class,'cart_items');
    }

    public static function countCart(){
        return Auth::user()->cartItem()->count();
    }
}
