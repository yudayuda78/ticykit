<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JawabanQuizMaker extends Model
{
    use HasFactory;

    protected $fillable = ['pertanyaan_id', 'jawaban', 'is_correct'];

    public function pertanyaanquizmaker(){
        return $this->belongsTo(PertanyaanQuizMaker::class, 'pertanyaan_id');
    }
}
