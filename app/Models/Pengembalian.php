<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'pengembalian';

    public function members()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
