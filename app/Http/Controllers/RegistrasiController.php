<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Services\KelurahanService;
use App\Services\RegistrasiService;

class RegistrasiController extends Controller
{
    protected $kelurahanService;
    protected $registrasiService;

    public function __construct(KelurahanService $kelurahanService, RegistrasiService $registrasiService)
    {
        $this->kelurahanService = $kelurahanService;
        $this->registrasiService = $registrasiService;
    }

    public function index()
    {
        $registrasiList = $this->registrasiService->getAllRegistrasi();

        return view('registrasi.index', compact('registrasiList'));
    }

    public function showRegistrasiForm()
    {
        // Mendapatkan data registrasi yang ingin di-edit
        $id = 1; // Contoh nilai ID, sesuaikan dengan kebutuhan Anda
        $registrasi = $this->registrasiService->getRegistrasiById($id);

        // Tampilkan view form registrasi dengan data registrasi dan ID
        return view('registrasi.form', ['registrasi' => $registrasi, 'id' => $id]);
    }


    public function submitRegistrasi(Request $request)
    {
        // Lakukan validasi dan proses lainnya

        // Ambil data kelurahan dari form
        $namaKelurahan = $request->input('kelurahan');
        $namaKecamatan = $request->input('kecamatan');
        $namaKota = $request->input('kota');

        // Panggil service untuk membuat data kelurahan baru
        $kelurahan = $this->kelurahanService->createKelurahan($namaKelurahan, $namaKecamatan, $namaKota);

        // Lanjutkan proses registrasi lainnya

        // Redirect atau tampilkan pesan sukses jika diperlukan
        return redirect()->back()->with('success', 'Data kelurahan berhasil disimpan');
    }

    public function editRegistrasi(Request $request, $id)
    {
        // Lakukan validasi dan proses lainnya
        $request->validate([
            'nama_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
        ]);

        // Ambil data kelurahan dari form
        $namaKelurahan = $request->input('nama_kelurahan');
        $namaKecamatan = $request->input('kecamatan');
        $namaKota = $request->input('kota');

        // Panggil service untuk mengupdate data registrasi
        $registrasi = $this->registrasiService->updateRegistrasi($id, [
            'nama_kelurahan' => $namaKelurahan,
            'nama_kecamatan' => $namaKecamatan,
            'nama_kota' => $namaKota,
        ]);

        // Redirect atau tampilkan pesan sukses jika diperlukan
        return redirect()->back()->with('success', 'Data registrasi berhasil diupdate');
    }


    public function updateKelurahan($id, $nama_kelurahan, $nama_kecamatan, $nama_kota)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->nama_kelurahan = $nama_kelurahan;
        $kelurahan->nama_kecamatan = $nama_kecamatan;
        $kelurahan->nama_kota = $nama_kota;
        $kelurahan->save();

        return $kelurahan;
    }



    public function deleteRegistrasi($id)
    {
        // Panggil service untuk menghapus data kelurahan
        $this->kelurahanService->deleteKelurahan($id);

        // Lanjutkan proses hapus lainnya

        // Redirect atau tampilkan pesan sukses jika diperlukan
        return redirect()->back()->with('success', 'Data kelurahan berhasil dihapus');
    }
}
