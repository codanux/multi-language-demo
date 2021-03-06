<?php

namespace App\Models\Post;

use App\Models\Tag\Tag;
use Codanux\MultiLanguage\Traits\HasLanguage\HasLanguage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory, HasLanguage;

    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(
            Post::class,
            'category_translation_of',
            'translation_of'
        )->locale($this->locale);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getLabel()
    {
        return $this->name;
    }
}
