<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Member extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $guarded = ['id'];

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class, 'member_id', 'id');
    }
}
