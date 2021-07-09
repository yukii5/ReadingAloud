<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function myCategory(){
        $category = \Request::query('category');
          $categories = $this::select('categories.*')
              ->leftJoin('categories', 'categories.id', '=','categories.category_id')
              ->where('categories.name', $category)
              ->where('status', 1)
              ->get();
          return $categories;
    }
    public function myTitle(){
        $title = \Request::query('title');
          $titles = $this::select('titles.*')
              ->leftJoin('titles', 'titles.id', '=','titles.title_id')
              ->where('titles.name', $title)
              ->where('status', 1)
              ->get();
          return $titles;
    }
    
    use HasFactory;
}
