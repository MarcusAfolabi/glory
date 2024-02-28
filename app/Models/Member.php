<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    protected $table = 'members';

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

}
