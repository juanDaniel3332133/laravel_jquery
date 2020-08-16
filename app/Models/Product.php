<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ProductHelper;

class Product extends Model
{
    use ProductHelper;

    public function __construct(array $attributes = [])
    {
        $this->setRawAttributes([
            'code' => self::generateCode(),
        ], true);

        parent::__construct($attributes);
    }

    protected $fillable = [
    	'name',
    	'description',
    	'image_path'
    ];

    /* setters & getters */

    public function setNameAttribute($value)
    {
    	$this->attributes['name'] = ucwords(mb_strtolower($value));
    }

    /* relations */

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

}
