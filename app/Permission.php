<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function users() {
        return $this->belongsToMay(User::class);    
    }

}
