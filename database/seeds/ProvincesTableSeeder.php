<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('provinces')->delete();
         DB::table('provinces')->insert(array(
             array('province' => 'Aceh'), //1
             array('province' => 'Bali'), //2
             array('province' => 'Bangka Belitung'), //3
             array('province' => 'Banten'), //4
             array('province' => 'Bengkulu'), //5
             array('province' => 'Gorontalo'), //6
             array('province' => 'Jakarta'), //7
             array('province' => 'Jambi'), //8
             array('province' => 'Jawa Barat'), //9
             array('province' => 'Jawa Tengah'), //10
             array('province' => 'Jawa Timur'), //11
             array('province' => 'Kalimantan Barat'), //12
             array('province' => 'Kalimantan Selatan'), //13
             array('province' => 'Kalimantan Tengah'), //14
             array('province' => 'Kalimantan Timur'), //15
             array('province' => 'Kalimantan Utara'), //16
             array('province' => 'Kepulauan Riau'), //17
             array('province' => 'Lampung'), //18
             array('province' => 'Maluku Utara'), //19
             array('province' => 'Maluku'), //20
             array('province' => 'Nusa Tenggara Barat'), //21
             array('province' => 'Nusa Tenggara Timur'), //22
             array('province' => 'Papua Barat'), //23
             array('province' => 'Papua'), //24
             array('province' => 'Riau'), //25
             array('province' => 'Sulawesi Selatan'), //26
             array('province' => 'Sulawesi Tengah'), //27
             array('province' => 'Sulawesi Tenggara'), //28
             array('province' => 'Sulawesi Utara'), //29
             array('province' => 'Sumatera Barat'), //30
             array('province' => 'Sumatera Selatan'), //31
             array('province' => 'Sumatera Utara'), //32
             array('province' => 'Yogyakarta'), //33
          ));
    }
}
