<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    protected $table = 'project_img';
    protected $primaryKey = 'img_id';
    public $timestamps = true;

    protected $fillable = [
        'project_id',
        'img_url',
    ];
}
