<?php

namespace App\Models\Tag;

use App\Models\Post\Post;
use Codanux\MultiLanguage\Traits\HasLanguage\HasLanguage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, HasLanguage;

    protected $guarded = [];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function postCategories()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }


    public function getLabel()
    {
        return $this->name;
    }
}
