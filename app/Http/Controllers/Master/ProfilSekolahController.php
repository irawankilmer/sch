<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\ProfilSekolahRequest;
use App\Models\Master\ProfilSekolah;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfilSekolahController extends Controller
{
  public function index(): View
  {
    return view('dashboard.master.profilsekolah.index', [
      'data' => ProfilSekolah::first(),
    ]);
  }

  public function update(ProfilSekolahRequest $request): RedirectResponse
  {
    // Ambil data profil sekolah (karena hanya ada satu)
    $profil = ProfilSekolah::firstOrFail();

    // Data valid yang sudah divalidasi oleh request
    $data = $request->validated();

    // Jika ada file logo diunggah
    if ($request->hasFile('logo_url')) {
      // Hapus logo lama jika ada
      if ($profil->logo_url && Storage::exists($profil->logo_url)) {
        Storage::delete($profil->logo_url);
      }

      // Simpan file baru ke storage dan ambil path-nya
      $path = $request->file('logo_url')->store('uploads/logo', 'public');
      $data['logo_url'] = $path;
    } else {
      // Jangan overwrite jika tidak upload baru
      unset($data['logo_url']);
    }

    // Update data
    $profil->update($data);

    // Redirect dengan pesan sukses
    return redirect()->route('master.profilSekolah')->with('success', 'Profil sekolah berhasil diperbarui.');
  }
}
