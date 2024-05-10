<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorities extends Model
{
    use HasFactory;

    protected $fillable = [
        'favorite_name',
        'favorite_description'
    ];

    protected $table = 'favorities';

    protected $primaryKey = 'favorite_id';

    public $incrementing = true;

    public function favorities(){
        return $this->belongsToMany(User::class);
    }
}
