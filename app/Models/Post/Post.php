<?php

namespace App\Models\Post;

use App\Events\Post\PostCreated;
use App\Events\Post\PostDeleted;
use App\Events\Post\PostUpdated;
use App\Models\Tag\Tag;
use App\Models\User;
use Codanux\MultiLanguage\Traits\HasLanguage\HasLanguage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class,
    ];

    use HasFactory, HasLanguage;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function category()
    {
        return $this->belongsTo(
            PostCategory::class,
            'category_translation_of',
            'translation_of'
        )->locale($this->locale);
    }
    public function getLabel()
    {
        return $this->name;
    }
}
