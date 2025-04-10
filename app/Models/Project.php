<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'project_id';
    public $timestamps = true;

    protected $fillable = [
        'project_name',
        'description',
        'project_url',
    ];

    // Relasi ke tabel project_images
    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }
}
