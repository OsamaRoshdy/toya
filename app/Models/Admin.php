<?php
namespace App\Models;

use App\Essentials\Traits\ImageTrait;
use App\Http\Foundation\Classes\Helper;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use ImageTrait;

    const LOCATION = 'admins';

    protected $fillable = [
        'name', 'email', 'password', 'image', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getImagePathAttribute()
    {
        return asset('storage/'. Helper::BASE_PATH . '/' . self::LOCATION . '/' . $this->image);
    }
}
