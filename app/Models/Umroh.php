<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umroh extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional)
    protected $table = 'umrohs';

    // Define the fillable attributes
    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'kecamatan',       // Added field
        'kelurahan',       // Added field
        'calon_jamaah',
        'pembimbing',
        'keberangkatan',
        'pekerjaan',
        'no_paspor',
        'masa_berlaku_paspor',
        'no_visa',
        'berlaku_sampai',
        'paket',
        'foto',
        'lampiran_ktp',
        'lampiran_kk',
        'lampiran_paspor',
    ];

    // Optionally define relationships
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Add any other necessary methods or scopes
}
