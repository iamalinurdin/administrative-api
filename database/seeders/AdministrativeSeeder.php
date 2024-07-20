<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Subdistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class AdministrativeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $provinces = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')->json()['provinsi'];

    foreach ($provinces as $province) {
      $provinceId = (int) $province['id'];

      Province::create([
        'id' => $provinceId,
        'name' => $province['nama']
      ]);

      $cities = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi={$provinceId}")->json()['kota_kabupaten'];

      foreach ($cities as $city) {
        $cityId = (int) $city['id'];

        City::create([
          'id' => $cityId,
          'province_id' => $city['id_provinsi'],
          'name' => $city['nama']
        ]);

        $districts = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota={$cityId}")->json()['kecamatan'];

        foreach ($districts as $district) {
          $districtId = (int) $district['id'];

          District::create([
            'id' => $districtId,
            'city_id' => $district['id_kota'],
            'name' => $district['nama']
          ]);

          $subdistricts = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan={$districtId}")->json()['kelurahan'];

          foreach ($subdistricts as $subdistrict) {
            Subdistrict::create([
              'id' => (int) $subdistrict['id'],
              'district_id' => $subdistrict['id_kecamatan'],
              'name' => $subdistrict['nama']
            ]);
          }
        }
      }
    }
  }
}
