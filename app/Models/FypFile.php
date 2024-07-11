<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FypFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'fyp_id',
        'location',
    ];


    public function fyp(){
        return $this->belongsTo(Fyp::class);
    }
}
