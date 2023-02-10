<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    public function shopping(){
        return $this->hasMany(ShoopingDetail::class);
    }
    protected $table = 'themes';
    protected $primaryKey = 'id';
    protected $fillable = ['kode_theme', 'name_theme', 'price', 'preview'];
}
