<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->delete();
      DB::table('categories')->insert(array(
          array('category' => 'Mobil', 'slug' => 'mobil', 'foto' => 'tmp-mobil.jpg', 'symbol' => 'car'), //1
          array('category' => 'Motor', 'slug' => 'motor', 'foto' => 'tmp-motor.jpg', 'symbol' => 'motorcycle'), //2
          array('category' => 'Properti', 'slug' => 'properti', 'foto' => 'tmp-properti.jpg', 'symbol' => 'home'), //3
          array('category' => 'Keperluan Pribadi', 'slug' => 'keperluan-pribadi', 'foto' => 'tmp-keperluan-pribadi.jpg', 'symbol' => 'umbrella'), //4
          array('category' => 'Elektronik & Gadget', 'slug' => 'elektronik-gadget', 'foto' => 'tmp-elektronik-gadget.jpg', 'symbol' => 'laptop'), //5
          array('category' => 'Hobi & Olahraga', 'slug' => 'hobi-olahraga', 'foto' => 'tmp-hobi-olahraga.jpg', 'symbol' => 'futbol-o'), //6
          array('category' => 'Rumah Tangga', 'slug' => 'rumah-tangga', 'foto' => 'tmp-rumah-tangga.jpg', 'symbol' => 'bed'), //7
          array('category' => 'Perlengkapan Bayi & Anak', 'slug' => 'perlengkapan-bayi-anak', 'foto' => 'tmp-perlengkapan-bayi-anak.jpg', 'symbol' => 'child'), //8
          array('category' => 'Jasa', 'slug' => 'jasa', 'foto' => 'tmp-jasa.jpg', 'symbol' => 'server'), //9
          array('category' => 'Kantor & Industri', 'slug' => 'kantor-industri', 'foto' => 'tmp-kantor-industri.jpg', 'symbol' => 'briefcase'), //10
          array('category' => 'Sci-Fi', 'slug' => 'sci-fi', 'foto' => 'tmp-sci-fi.jpg', 'symbol' => 'television'), //11
          array('category' => 'Lowongan Kerja', 'slug' => 'lowongan-kerja', 'foto' => 'tmp-lowongan-kerja.jpg', 'symbol' => 'globe'), //12
          ));
    }
}
