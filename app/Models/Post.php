<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content','thumbnail'];

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }
    

    /**
     * Get the author of the post.
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
