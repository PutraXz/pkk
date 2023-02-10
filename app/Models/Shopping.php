<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;
    use HasFactory;
    public function theme(){
        return $this->belongsTo(Theme::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $table = 'shoppings';
    protected $primaryKey = 'id';
    protected $fillable = ['theme_id', 'user_id', 'status', 'jumlah_harga'];

}
