<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable=[
        'name',
        'img_filename',
    ];
    use HasFactory;
    public function contests()
    {
        return $this->hasMany(Contest::class);
    }
}
