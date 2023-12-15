<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
