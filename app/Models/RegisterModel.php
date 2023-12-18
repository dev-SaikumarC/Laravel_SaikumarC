<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $table = 'userstable';
    protected $fillable = ['name','email','file_name'];
}
