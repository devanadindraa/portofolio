<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Class Personal extends Model
{
    use HasFactory;

    protected $table = 'about';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'nim',
        'major',
        'faculty',
        'biography',
        'img_url',
    ];

    public function skills() {
        return $this->hasMany(Skill::class, 'personal_id', 'id');
    }
}