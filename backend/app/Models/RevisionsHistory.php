<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionsHistory extends Model
{
    use HasFactory;

    protected $fillable = ['document_id', 'previous_content', 'new_content', 'edited_by'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
