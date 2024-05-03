<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_name',
        'post_description'
    ];
    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    public $incrementing = true;

    /**
     * Relationship
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
