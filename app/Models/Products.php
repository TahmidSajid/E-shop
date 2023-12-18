<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\categories;

class Products extends Model
{
    use HasFactory;
    public function catetoprod():HasOne
    {
        return $this->hasOne(categories::class,'id','category_id');
    }
    protected  $guarded = [];

}
