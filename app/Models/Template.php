<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "template";
    protected $guarded = ["id"];

    protected $fillable = [
        'nama', 'email', 'no_hp', 'alamat',
        'fk_provinsi', 'fk_kabupaten', 'copyright',
        'logo_besar', 'logo_kecil', 'banner1', 'banner2',
        'updated_by', 'updated_at'
    ];
    
}
