<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

class EloquentRepository implements NewsRepository
{
    public function search(string $query = ''): Collection
    {
        return News::query()
            ->where('body', 'like', "%{$query}%")
            ->orWhere('title', 'like', "%{$query}%")
            ->get();
    }
}