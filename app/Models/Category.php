<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * @return HasMany
     */
    public function interests(): HasMany
    {
        return $this->hasMany(Interest::class);
    }
}
