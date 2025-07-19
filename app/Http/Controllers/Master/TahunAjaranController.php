<?php
namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\TahunAjaran;
use App\Models\Master\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TahunAjaranController extends Controller
{
  public function index()
  {
    $tahunAktif = TahunAjaran::with('semester')->where('status', true)->first();
    $tahunAjarans = TahunAjaran::with('semester')->latest()->paginate(10);

    return view('dashboard.master.tahunajaran.index', compact('tahunAktif', 'tahunAjarans'));
  }

  public function activateSemester($id)
  {
    $semester = Semester::findOrFail($id);

    // Nonaktifkan semua semester aktif
    Semester::where('status', true)->update(['status' => false]);

    // Nonaktifkan semua tahun ajaran aktif
    TahunAjaran::where('status', true)->update(['status' => false]);

    // Aktifkan semester yang dipilih
    $semester->update(['status' => true]);

    // Aktifkan tahun ajaran dari semester tersebut
    $semester->tahunAjaran->update(['status' => true]);

    return back()->with('success', 'Semester dan Tahun Ajaran berhasil diaktifkan.');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'tahun_ajaran_tambah' => 'required|unique:tahun_ajaran,tahun_ajaran',
    ], [], [
      'tahun_ajaran_tambah' => 'Tahun ajaran',
    ]);

    // Simpan
    $tahunAjaran = TahunAjaran::create([
      'tahun_ajaran' => $request->input('tahun_ajaran_tambah'),
      'status' => false,
    ]);

    $tahunAjaran->semester()->createMany([
      [
        'semester' => 'Semester 1',
        'periode' => 'Ganjil',
        'status' => false
      ],
      [
        'semester' => 'Semester 2',
        'periode' => 'Genap',
        'status' => false
      ]
    ]);

    return back()->with('success', 'Tahun ajaran berhasil ditambahkan.');
  }

  public function update(Request $request, $id)
  {
    $tahun = TahunAjaran::findOrFail($id);

    $validator = Validator::make($request->all(), [
      'tahun_ajaran' => 'required|unique:tahun_ajaran,tahun_ajaran,' . $tahun->id,
    ], [], [
      'tahun_ajaran' => 'Tahun ajaran',
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator, 'edit')->withInput()->with('edit_id', $id);
    }

    $tahun->update([
      'tahun_ajaran' => $request->tahun_ajaran,
    ]);

    return back()->with('success', 'Tahun ajaran berhasil diupdate.');
  }


}
