<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;
    protected $table = 'weddings';
    protected $primaryKey = 'id';
    protected $fillable = ['name_url', 'title', 'name_groom', 'name_bride', 'child_groom', 'father_groom', 'mother_groom', 'child_bride', 'father_bride', 'mother_bride', 'image', 'date_count', 'theme_name'];
}
