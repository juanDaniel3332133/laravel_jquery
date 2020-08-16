<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /* setters & getters */

    public function setNameAttribute($value)
    {
    	$this->attributes['name'] = mb_strtoupper($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->toDateString();
    }

    /* relations */

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }
}
