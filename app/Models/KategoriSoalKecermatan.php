<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriSoalKecermatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "kategori_soal_kecermatan";
    protected $guarded = ["id"];
    public function soal()
    {
        return $this->hasMany(MasterSoalKecermatan::class, 'fk_kategori_soal_kecermatan'); // Sesuaikan dengan nama model master soal
    }
}
