<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table ='posts';

    protected $fillable = [
      'title',
      'slug',
      'subtitle',
      'body',
      'image',
      'posted_by',
      'status',
      'category_id',
  ];
}
