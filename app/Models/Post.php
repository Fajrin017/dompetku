<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Carbon;



class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author', 'category'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d-m-Y h:i:s');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query-> where('title', 'like', '%'. $search . '%')
            ->orWhere('no_dokumen', 'like', '%'. $search . '%') ;
    });

        $query->when($filters['category'] ?? false, function($query, $category) {
        return $query-> whereHas('category', function($query) use ($category) {
        $query->where('slug', $category);
        });
    });

        $query->when($filters['author'] ?? false, function($query, $author) {
        return $query-> whereHas('author', function($query) use ($author) {
        $query->where('username', $author);
        });
    });

    }

        public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
        {
            return [
                'slug' => [
                    'source' => 'title'
                ]
            ];
        }

    


        

}
