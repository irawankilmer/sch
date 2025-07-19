<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class ProfilSekolahRequest extends FormRequest
{
  /**
   * Apakah pengguna berhak melakukan request ini?
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Aturan validasi untuk request ini.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'nama_sekolah' => ['required', 'string', 'max:255'],
      'npsn' => ['required', 'digits:8'], // NPSN = 8 digit angka
      'akreditasi' => ['required', 'string', 'in:A,B,C,D,Terakreditasi,Belum Terakreditasi'],
      'logo_url' => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
      'address' => ['required', 'string', 'max:500'],
      'phone' => ['required', 'string', 'max:20'],
      'email' => ['required', 'email'],
      'tingkat' => ['required', 'in:SD,SMP,SMA,SMK'],
      'status' => ['required', 'in:Negeri,Swasta'],
    ];
  }

  /**
   * Pesan error khusus jika validasi gagal.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
      'nama_sekolah.required' => 'Kolom Nama Sekolah wajib diisi.',
      'npsn.required' => 'Kolom NPSN wajib diisi.',
      'npsn.digits' => 'NPSN harus terdiri dari 8 angka.',
      'akreditasi.required' => 'Kolom Akreditasi wajib diisi.',
      'akreditasi.in' => 'Pilih akreditasi yang valid.',
      'logo_url.image' => 'Logo harus berupa file gambar.',
      'logo_url.mimes' => 'Logo harus berupa file JPG, JPEG, PNG, atau WEBP.',
      'logo_url.max' => 'Ukuran logo maksimal 2MB.',
      'address.required' => 'Alamat sekolah wajib diisi.',
      'phone.required' => 'Nomor telepon wajib diisi.',
      'email.required' => 'Email wajib diisi.',
      'email.email' => 'Email harus berformat valid.',
      'tingkat.required' => 'Kolom Tingkat wajib diisi.',
      'tingkat.in' => 'Tingkat harus salah satu dari: SD, SMP, SMA, SMK.',
      'status.required' => 'Kolom Status wajib diisi.',
      'status.in' => 'Status harus Negeri atau Swasta.',
    ];
  }

  /**
   * Apakah file logo dikirim?
   *
   * @return bool
   */
  public function hasLogo(): bool
  {
    return $this->hasFile('logo_url');
  }
}
