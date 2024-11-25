<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    // use HasFactory;

    // protected $fillable = ['name', 'price', 'stock'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'stock', 'brand_id', 'category_id'];
    public function brands() {
        return $this->belongsTo(brand::class);
    }

    public function categories() {
        return $this->belongsTo(category::class);
    }
}
