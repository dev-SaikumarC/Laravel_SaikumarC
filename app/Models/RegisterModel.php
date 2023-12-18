<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    
    protected $table = 'adminregister';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'passoword', 'name'];

    use HasFactory;
}
