<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'users_comment';
    public $timestamps = true;

    protected $fillable = [
        'publication_id',
        'published_by',
        'content',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'publication_id');
    }

    public function user()
    {
        return $this->belongsTo(UserProfile::class, 'published_by', 'user_id');
    }
}
