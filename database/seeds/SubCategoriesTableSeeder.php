<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sub_categories')->delete();
      DB::table('sub_categories')->insert(array(
          array('category_id' => '1', 'name' => 'Mobil Baru', 'slug' => 'mobil-baru'),
          array('category_id' => '1', 'name' => 'Mobil Bekas', 'slug' => 'mobil-bekas'),
          array('category_id' => '1', 'name' => 'Aksesoris', 'slug' => 'aksesoris'),
          array('category_id' => '1', 'name' => 'Audio Mobil', 'slug' => 'audio-mobil'),
          array('category_id' => '1', 'name' => 'Sparepart', 'slug' => 'sparepart'),
          array('category_id' => '1', 'name' => 'Velg dan Ban', 'slug' => 'velg-ban'),
          array('category_id' => '2', 'name' => 'Motor Baru', 'slug' => 'motor-baru'),
          array('category_id' => '2', 'name' => 'Motor Bekas', 'slug' => 'motor-bekas'),
          array('category_id' => '2', 'name' => 'Aksesoris', 'slug' => 'aksesoris-2'),
          array('category_id' => '2', 'name' => 'Helm', 'slug' => 'helm'),
          array('category_id' => '2', 'name' => 'Sparepart', 'slug' => 'sparepart-2'),
          array('category_id' => '3', 'name' => 'Rumah', 'slug' => 'rumah'),
          array('category_id' => '3', 'name' => 'Apartement', 'slug' => 'apartemen'),
          array('category_id' => '3', 'name' => 'Indekos', 'slug' => 'indekos'),
          array('category_id' => '3', 'name' => 'Bangunan Komersil', 'slug' => 'bangunan-komersil'),
          array('category_id' => '3', 'name' => 'Tanah', 'slug' => 'tanah'),
          array('category_id' => '3', 'name' => 'Properti Lainnya', 'slug' => 'properti-lainnya'),
          array('category_id' => '4', 'name' => 'Fashion Wanita', 'slug' => 'fashion-wanita'),
          array('category_id' => '4', 'name' => 'Fashion Pria', 'slug' => 'fashion-pria'),
          array('category_id' => '4', 'name' => 'Jam tangan', 'slug' => 'jam-tangan'),
          array('category_id' => '4', 'name' => 'Pakaian Olahraga', 'slug' => 'pakaian-olahraga'),
          array('category_id' => '4', 'name' => 'Perhiasan', 'slug' => 'perhiasan'),
          array('category_id' => '4', 'name' => 'Make Up & Parfum', 'slug' => 'makeup-parfum'),
          array('category_id' => '4', 'name' => 'Terapi & Pengobatan', 'slug' => 'terapi-pengobatan'),
          array('category_id' => '4', 'name' => 'Perawatan', 'slug' => 'perawatan'),
          array('category_id' => '4', 'name' => 'Nutrisi & Suplemen', 'slug' => 'minuman-suplemen'),
          array('category_id' => '4', 'name' => 'Lainnya', 'slug' => 'lainnya'),
          array('category_id' => '5', 'name' => 'Handphone', 'slug' => 'handphone'),
          array('category_id' => '5', 'name' => 'Tablet', 'slug' => 'tablet'),
          array('category_id' => '5', 'name' => 'Aksesoris HP & Tablet', 'slug' => 'aksesoris-hp-tablet'),
          array('category_id' => '5', 'name' => 'Fotografi', 'slug' => 'fotografi'),
          array('category_id' => '5', 'name' => 'Elektronik Rumah Tangga', 'slug' => 'elektronik-rumah-tangga'),
          array('category_id' => '5', 'name' => 'Games & Console', 'slug' => 'games-console'),
          array('category_id' => '5', 'name' => 'Komputer', 'slug' => 'komputer'),
          array('category_id' => '5', 'name' => 'Lampu', 'slug' => 'lampu'),
          array('category_id' => '5', 'name' => 'TV & Audio Video', 'slug' => 'tv-audio-video'),
          array('category_id' => '6', 'name' => 'Alat-alat Musik', 'slug' => 'alat-musik'),
          array('category_id' => '6', 'name' => 'Olahraga', 'slug' => 'olah-raga'),
          array('category_id' => '6', 'name' => 'Sepeda & Aksesoris', 'slug' => 'sepeda-aksesoris'),
          array('category_id' => '6', 'name' => 'Handicrafts', 'slug' => 'handicrafts'),
          array('category_id' => '6', 'name' => 'Barang Antik', 'slug' => 'barang-antik'),
          array('category_id' => '6', 'name' => 'Buku & Majalah', 'slug' => 'buku-majalah'),
          array('category_id' => '6', 'name' => 'Koleksi', 'slug' => 'koleksi'),
          array('category_id' => '6', 'name' => 'Mainan Hobi', 'slug' => 'mainan-hobi'),
          array('category_id' => '6', 'name' => 'Musik & Film', 'slug' => 'musik-film'),
          array('category_id' => '6', 'name' => 'Hewan Peliharaan', 'slug' => 'hewan-peliharaan'),
          array('category_id' => '7', 'name' => 'Makanan & Minuman', 'slug' => 'makanan-minuman'),
          array('category_id' => '7', 'name' => 'Furniture', 'slug' => 'furniture'),
          array('category_id' => '7', 'name' => 'Dekorasi Rumah', 'slug' => 'dekorasi-rumah'),
          array('category_id' => '7', 'name' => 'Konstruksi & Taman', 'slug' => 'konstruksi-taman'),
          array('category_id' => '7', 'name' => 'Jam', 'slug' => 'jam'),
          array('category_id' => '7', 'name' => 'Lampu', 'slug' => 'lampu-1'),
          array('category_id' => '7', 'name' => 'Perlengkapan Rumah', 'slug' => 'perlengkapan-rumah'),
          array('category_id' => '7', 'name' => 'Lain-lain', 'slug' => 'lain-lain-1'),
          array('category_id' => '8', 'name' => 'Pakaian', 'slug' => 'pakaian'),
          array('category_id' => '8', 'name' => 'Perlengkapan Bayi', 'slug' => 'perlengkapan-bayi'),
          array('category_id' => '8', 'name' => 'Perlengkapan Ibu Bayi', 'slug' => 'perlengkapan-ibu-bayi'),
          array('category_id' => '8', 'name' => 'Boneka & Mainan Anak', 'slug' => 'boneka-mainan-anak'),
          array('category_id' => '8', 'name' => 'Buku Anak-anak', 'slug' => 'buku-anak'),
          array('category_id' => '8', 'name' => 'Stroller', 'slug' => 'stroller'),
          array('category_id' => '8', 'name' => 'Lain-lain', 'slug' => 'lain-lain-2'),
          array('category_id' => '9', 'name' => 'Jasa', 'slug' => 'jasa'),
          array('category_id' => '10', 'name' => 'Peralatan Kantor', 'slug' => 'peralatan-kantor'),
          array('category_id' => '10', 'name' => 'Perlengkapan Usaha', 'slug' => 'perlengkapan-usaha'),
          array('category_id' => '10', 'name' => 'Mesin & Keperluan Industri', 'slug' => 'mesin-keperluan-industri'),
          array('category_id' => '10', 'name' => 'Stationery', 'slug' => 'stationery'),
          array('category_id' => '10', 'name' => 'Lain-lain', 'slug' => 'lain-lain-3'),
          array('category_id' => '11', 'name' => 'Sci-Fi', 'slug' => 'sci-fi'),
          array('category_id' => '12', 'name' => 'Lowongan', 'slug' => 'lowongan'),
          array('category_id' => '12', 'name' => 'Cari Pekerjaan', 'slug' => 'cari-pekerjaan'),
        ));
    }
}
