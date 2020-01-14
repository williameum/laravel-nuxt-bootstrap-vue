<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $table = 'dogs';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
