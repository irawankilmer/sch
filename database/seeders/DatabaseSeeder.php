<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Master\ProfilSekolah;
use App\Models\Master\Jurusan;
use App\Models\Master\TahunAjaran;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('superadmin123Aa*'),
        ]);

        $role = Role::create([
            'name' => 'Super Admin',
            'description' => 'Ini adalah super admin',
        ]);

        $user->roles()->save($role);

        Role::create([
            'name' => 'Admin',
            'description' => 'Ini Admin',
        ]);

        $user->profile()->create([
            'full_name'     => 'Super Admin',
            'image'         => 'default.jpg',
            'jenis_kelamin' => 1,
        ]);


        ProfilSekolah::create([
            'nama_sekolah'  => 'SMK ASSALAM SAMARANG',
            'npsn'          => '123456',
            'akreditasi'    => 'C',
            'logo_url'      => 'default_logo.jpg',
            'address'       => 'Samarang',
            'phone'         => '123',
            'email'         => 'samarang@email.com',
            'tingkat'       => 'SMK',
            'status'        => 'Swasta',
        ]);

        $jurusan = [
            ['nama_jurusan' => 'Pemodelan Perangkat Lunak dan GIM', 'singkatan' => 'PPLG'],
            ['nama_jurusan' => 'Teknik Kendaraan Ringan dan Otomotif', 'singkatan' => 'TKRO'],
            ['nama_jurusan' => 'Teknik dan Bisnis Sepeda Motor', 'singkatan' => 'TBSM'],
            ['nama_jurusan' => 'Manajemen Perkantoran dan Layanan Bisnis', 'singkatan' => 'MPLB'],
        ];

        foreach ($jurusan as $j) {
            Jurusan::create([
                'nama_jurusan'  => $j['nama_jurusan'],
                'singkatan'     => $j['singkatan'],
            ]);
        }

        $tahunAjaran = TahunAjaran::create([
            'tahun_ajaran'  => '2025/2026',
            'status'        => true,
        ]);

        $tahunAjaran->semester()->createMany([
            ['semester' => 'Semester 1', 'periode' => 1, 'status' => true],
            ['semester' => 'Semester 2', 'periode' => 2, 'status' => false],
        ]);
    }
}
