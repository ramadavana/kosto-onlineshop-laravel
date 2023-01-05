<?php

use Illuminate\Database\Seeder;
use App\Orderstatus;
class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Belum Bayar'],
            ['name' => 'Perlu Di Cek'],
            ['name' => 'Telah Di Bayar'],
            ['name' => 'Pengambilan Kunci'],
            ['name' => 'Kunci telah diambil'],
            ['name' => 'Pesanan Di Batalkan'],
        ];
        Orderstatus::insert($data);
    }
}
