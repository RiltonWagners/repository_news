<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

interface NewsRepository
{
    public function search(string $query = ''): Collection;
}