<?php

namespace App\Services;

use App\Models\Kelurahan;

class KelurahanService
{
    public function createKelurahan($namaKelurahan, $namaKecamatan, $namaKota)
    {
        $kelurahan = new Kelurahan();
        $kelurahan->nama_kelurahan = $namaKelurahan;
        $kelurahan->nama_kecamatan = $namaKecamatan;
        $kelurahan->nama_kota = $namaKota;
        $kelurahan->save();

        return $kelurahan;
    }

    public function updateKelurahan($id, $namaKelurahan, $namaKecamatan, $namaKota)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->nama_kelurahan = $namaKelurahan;
        $kelurahan->nama_kecamatan = $namaKecamatan;
        $kelurahan->nama_kota = $namaKota;
        $kelurahan->save();

        return $kelurahan;
    }

    public function deleteKelurahan($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();
    }
}
