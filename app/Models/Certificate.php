<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificate';
    protected $primaryKey = 'certif_id';
    public $timestamps = true;

    protected $fillable = [
        'certif_name',
        'certif_link',
        'img_url',
    ];
}