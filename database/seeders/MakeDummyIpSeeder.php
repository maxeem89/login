<?php

namespace Database\Seeders;

use App\Models\ipAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakeDummyIpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ipAddress::insert([[
       'ip' => '4.173.53.57'
      ],[
        'ip' => '251.20.141.168'
      ],[
        'ip' => '182.87.192.147'
      ],[
        'ip' => '250.231.121.111'
      ],[
        'ip' => '199.41.3.23'
      ],[
        'ip' => '95.54.64.114'
      ],[
        'ip' => '161.70.33.57'
      ],[
        'ip' => '45.23.219.166'
      ],[
        'ip' => '18.125.62.192'
      ],[
        'ip' => '172.198.49.39'
      ],[
        'ip' => '52.145.229.20'
      ],[
        'ip' => '69.129.223.187'
      ],[
        'ip' => '87.69.134.76'
       ]
    ]);
    }
}
