<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanQuizMaker extends Model
{
    use HasFactory;

    protected $fillable = ['generatesoal_id', 'pertanyaan'];

    public function quizmaker(){
        return $this->belongsTo(quizmaker::class, 'generatesoal_id');
    }

    public function jawabanquizmaker(){
        return $this->hasMany(JawabanQuizMaker::class, 'pertanyaan_id');
    }
}
