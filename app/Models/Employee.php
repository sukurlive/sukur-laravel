<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey   ='id_emp';
    public $incrementing    = true;
    protected $fillable     = ['jabatan_id', 'nama', 'email', 'alamat', 'img'];

    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id', 'id_position');
    }

}