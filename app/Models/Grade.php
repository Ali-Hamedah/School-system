<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;

    public $translatable = ['Name'];// خاص بادخال البيانات بترجمه
    protected $table = 'Grades';
    public $timestamps = true;

}
