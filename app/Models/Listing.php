<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'website',
        'tags',
        'email',
        'description',
        'logo',
        'user_id'
    ];


    // for search and filtration using tags
    public function scopeFilter($query, array $filters)
    {
        // tag filtration
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // search filtration
        if ($filters['search'] ?? false) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // user to listing relationship
    public function userRelation() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
