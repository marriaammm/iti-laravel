<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable =[
        'title',
        'description',
        'user_id',
    ];
    protected $appends = ['formatted_created_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function postCreator()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments()
    {
        return $this->morphMany(Comments::class, 'commentable');
    }
    public function getFormattedCreatedAtAttribute()
    {
    return $this->created_at->format('Y-m-d');
    }
}
