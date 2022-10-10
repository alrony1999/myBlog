<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    protected $with=['author','category'];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('title', 'Like', '%'.$search.'%')
                    ->orWhere('body', 'Like', '%'.$search.'%')
            )
        );


        $query->when(
            $filters['category']?? false,
            fn ($query, $category) =>
                $query->whereHas(
                    'category',
                    fn ($query) =>
                    $query->where('slug', $category)
                )
        );

        $query->when(
            $filters['author']?? false,
            fn ($query, $author) =>
                $query->whereHas(
                    'author',
                    fn ($query) =>
                    $query->where('slug', $author)
                )
        );
    }
    public function scopeSearch($query, $search)
    {
        $query->when(
            $search?? false,
            fn ($query, $search) =>
                $query->where('id', $search)
                ->orWhere('title', 'Like', '%'.$search.'%')
                ->orWhere('excerpt', 'Like', '%'.$search.'%')
                ->orWhere('body', 'Like', '%'.$search.'%')
        );
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
