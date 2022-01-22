<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->number = Str::uuid();
        });
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('price', 'quantity');
    }
}
