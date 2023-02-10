<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleUpload extends Model
{
    use HasFactory;
    protected $table = 'multiple_uploads';
    protected $primaryKey = 'id';
    protected $fillable = ['filename', 'name_url'];
}
