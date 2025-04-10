<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';
    protected $primaryKey = 'skill_id';
    public $timestamps = true;

    protected $fillable = [
        'skill_name',
        'skill_ratio',
        'personal_id',
        'experience',
        'period',
        'img_url',
    ];

    public function personal() {
        return $this->belongsTo(Personal::class, 'personal_id', 'id');
    }
    
}