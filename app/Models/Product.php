<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        "name",
        "description",
        "price",
        "thumbnail",
        "user_id",
    ];

    public function getImageUrlAttribute() {
        if($this->thumbnail)
            return Storage::url($this->thumbnail);
        return asset('assets/images/blank.jpg');
    }
}
