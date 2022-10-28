<?php

namespace App\Models;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name', 'image', 'price', 'type', 'description'];

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'course_languages', 'course_id', 'language_id');
    }
}
