<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    protected $table = 'user_profile';

    protected $primaryKey = 'user_profile_id';

    public $incrementing = true;


    public function user()
    {
        return $this->hasOne(User::class);
    }
}
