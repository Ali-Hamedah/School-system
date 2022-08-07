<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{

    use HasTranslations;

    public $translatable = ['Name_Class'];// خاص بادخال البيانات بترجمه

    protected $table = 'Classrooms';
    protected $fillable = ['Name_Class', 'Grade_id'];
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

}
