<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $primaryKey ='id_position';
    public $incrementing = false;
    protected $fillable = ['nama_jabatan', 'gaji_pokok'];

    protected function formatGaji()
    {
        //
    }
}
