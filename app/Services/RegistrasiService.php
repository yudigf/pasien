<?php

namespace App\Services;

use App\Models\Kelurahan;

class RegistrasiService
{
    public function createRegistrasi($data)
    {
        $registrasi = Kelurahan::create($data);

        return $registrasi;
    }

    public function updateRegistrasi($id, $data)
    {
        $registrasi = Kelurahan::findOrFail($id);
        $registrasi->update($data);

        return $registrasi;
    }

    public function deleteRegistrasi($id)
    {
        $registrasi = Kelurahan::findOrFail($id);
        $registrasi->delete();

        return true;
    }

    public function getRegistrasiById($id)
    {
        $registrasi = Kelurahan::findOrFail($id);
    
        return $registrasi;
    }

    public function getAllRegistrasi()
    {
        $registrasi = Kelurahan::all();

        return $registrasi;
    }
}
