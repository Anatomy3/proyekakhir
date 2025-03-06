<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'base_price',
        'dimensions',
        'materials',
        'colors',
        'options',
        'type',
        'stock',
        'is_active',
        'production_days',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'dimensions' => 'array',
        'materials' => 'array',
        'colors' => 'array',
        'options' => 'array',
        'is_active' => 'boolean',
        'stock' => 'integer',
        'production_days' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
    
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getCoverImageAttribute()
    {
        return $this->images()->where('is_primary', true)->first()?->image_path 
            ?? $this->images()->first()?->image_path 
            ?? 'images/no-image.jpg';
    }
    
    public function isCustomizable(): bool
    {
        return $this->type === 'customizable';
    }
    
    public function isInStock(): bool
    {
        if ($this->type === 'customizable') {
            return true;
        }
        
        return $this->stock > 0;
    }
}