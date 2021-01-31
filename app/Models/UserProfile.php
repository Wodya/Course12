<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $primaryKey = "id";

    protected $fillable = ['name','is_admin'];
}
