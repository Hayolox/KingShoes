<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaction(){
        return $this->hasOne(Transaction::class, 'package_types_id', 'id');
    }
}
