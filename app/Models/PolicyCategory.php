<?php

namespace App\Models;

use App\Models\Policy;
use Illuminate\Database\Eloquent\Model;

class PolicyCategory extends Model
{
    protected $fillable = ['name'];

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }
}
