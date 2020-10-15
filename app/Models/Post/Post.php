<?php

namespace App\Models\Post;

use Codanux\MultiLanguage\Traits\HasLanguage\HasLanguage;
use Codanux\MultiLanguage\Traits\HasMedia\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model // implements HasMedia
{
    use HasFactory, HasLanguage;
    // use InteractsWithMedia, MediaTrait { MediaTrait::getMedia insteadof InteractsWithMedia; }

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(
            PostCategory::class,
            'category_translation_of',
            'translation_of'
        )->locale($this->locale);
    }
}