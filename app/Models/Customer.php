<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'jenis_kelamin',
    ];

    public function bank(){
        return $this->hasOne('App\Models\bank');
    }
}
