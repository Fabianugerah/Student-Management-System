<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Carbon\Carbon;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada (optional)
        Siswa::truncate();

        $dataSiswa = [
            [
                'nisn' => '0012345678',
                'nama_siswa' => 'Ahmad Fauzi Rahman',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Suwayuwo',
                'tanggal_lahir' => '2005-03-15',
                'alamat' => 'Jl. Merdeka No. 34, Suwayuwo, Pasuruan',
                'telepon' => '081234567890',
                'kelas' => 'XII-RPL',
            ],
            [
                'nisn' => '0012345679',
                'nama_siswa' => 'Siti Nurhaliza Putri',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2006-07-22',
                'alamat' => 'Jl. Sudirman No. 456, Bandung, Jawa Barat 40115',
                'telepon' => '082345678901',
                'kelas' => 'XII-MKT',
            ],
            [
                'nisn' => '0012345680',
                'nama_siswa' => 'Muhammad Iqbal Hakim',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2006-01-10',
                'alamat' => 'Jl. Pemuda No. 789, Surabaya, Jawa Timur 60271',
                'telepon' => '083456789012',
                'kelas' => 'XII-DKV',
            ],
            [
                'nisn' => '0012345681',
                'nama_siswa' => 'Dewi Sartika Maharani',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '2006-09-05',
                'alamat' => 'Jl. Malioboro No. 321, Yogyakarta, DIY 55213',
                'telepon' => '084567890123',
                'kelas' => 'XII-TKR',
            ],
            [
                'nisn' => '0012345682',
                'nama_siswa' => 'Rizky Pratama Wijaya',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '2006-11-18',
                'alamat' => 'Jl. Gatot Subroto No. 654, Medan, Sumatera Utara 20112',
                'telepon' => '085678901234',
                'kelas' => 'XII-TL',
            ],
            [
                'nisn' => '0012345683',
                'nama_siswa' => 'Aisyah Rahmadani',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Makassar',
                'tanggal_lahir' => '2006-04-12',
                'alamat' => 'Jl. Diponegoro No. 987, Makassar, Sulawesi Selatan 90111',
                'telepon' => '086789012345',
                'kelas' => 'XII-TKJ',
            ],
            [
                'nisn' => '0012345684',
                'nama_siswa' => 'Bayu Setiawan Nugroho',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '2006-08-25',
                'alamat' => 'Jl. Pandanaran No. 147, Semarang, Jawa Tengah 50241',
                'telepon' => '087890123456',
                'kelas' => 'XII-APHP',
            ],
            [
                'nisn' => '0012345685',
                'nama_siswa' => 'Indira Safitri Putri',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '2006-06-30',
                'alamat' => 'Jl. Sudirman No. 258, Palembang, Sumatera Selatan 30114',
                'telepon' => '088901234567',
                'kelas' => 'XII-TBKR',
            ],
            [
                'nisn' => '0012345686',
                'nama_siswa' => 'Arief Budiman Santoso',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2006-02-14',
                'alamat' => 'Jl. Ijen No. 369, Malang, Jawa Timur 65119',
                'telepon' => '089012345678',
                'kelas' => 'XII-DKV',
            ],
            [
                'nisn' => '0012345687',
                'nama_siswa' => 'Farah Diba Anindita',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Denpasar',
                'tanggal_lahir' => '2006-12-08',
                'alamat' => 'Jl. Gajah Mada No. 741, Denpasar, Bali 80112',
                'telepon' => '090123456789',
                'kelas' => 'XII-TL',
            ],
            [
                'nisn' => '0012345688',
                'nama_siswa' => 'Dani Kurniawan',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Bekasi',
                'tanggal_lahir' => '2006-05-20',
                'alamat' => 'Jl. Ahmad Yani No. 182, Bekasi, Jawa Barat 17141',
                'telepon' => '081123456789',
                'kelas' => 'XII-TPM',
            ],
            [
                'nisn' => '0012345689',
                'nama_siswa' => 'Maya Sari Dewi',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Tangerang',
                'tanggal_lahir' => '2006-10-03',
                'alamat' => 'Jl. Raya Serpong No. 456, Tangerang, Banten 15310',
                'telepon' => '082987654321',
                'kelas' => 'XII-TKJ',
            ],
            [
                'nisn' => '0013571828',
                'nama_siswa' => 'Ucup Suprapti',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Gempol',
                'tanggal_lahir' => '2006-10-03',
                'alamat' => 'Jl. Raya Temas No. 456, Gempol, Pasuruan',
                'telepon' => '082831823203',
                'kelas' => 'XII-ATPH',
            ],
            [
                'nisn' => '0029173918',
                'nama_siswa' => 'Anam Ulohadi',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Lawang',
                'tanggal_lahir' => '2001-11-07',
                'alamat' => 'Jl. Lawang No. 78, Lawang, Malang',
                'telepon' => '082987654321',
                'kelas' => 'XII-TKJ',
            ],
        ];

        foreach ($dataSiswa as $siswa) {
            Siswa::create($siswa);
        }

        $this->command->info('Data siswa berhasil ditambahkan: ' . count($dataSiswa) . ' records');
    }
}
