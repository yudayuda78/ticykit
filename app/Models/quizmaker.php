<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizmaker extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'description', 'slug', 'user_id'];

   
    public function pertanyaanquizmakers(){
        return $this->hasMany(PertanyaanQuizMaker::class, 'generatesoal_id');
    }
}
