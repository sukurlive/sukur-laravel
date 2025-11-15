<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Atrribute;

class Position extends Model
{
    protected $primaryKey ='id_position';
    public $incrementing = false;
    protected $fillable = ['nama_jabatan', 'gaji_pokok'];

    protected function formatGaji(): Attribute
    {
        return Attribute::make(
            fn ($value, $attributes) => 'Rp ' . number_format($attributes['gaji_pokok'], 0, ',', '.')
        );
    }
}
