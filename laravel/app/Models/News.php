<?php

namespace App\Models;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use Searchable;

    protected $casts = [
        'tags' => 'json',
    ];

    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'title',
        'date',
        'url',
        'source',
        'contents'
    ];

    protected $mappingProperties = array(
        'title' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'source' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'contents' => [
            'type' => 'text',
            "analyzer" => "standard",
          ],
          'url' => [
            'type' => 'text',
            "analyzer" => "standard",
          ],
          'date' => [
            'type' => 'timestamp',
            "analyzer" => "standard",
          ],
      );
}
