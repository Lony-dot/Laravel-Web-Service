<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    //protected $table = 'categories';
    public function getResults($name = null)
    {
        if(!$name)
            return $this->get();

       return $this->where('name', 'LIKE', "%{$name}%")
                ->get();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
