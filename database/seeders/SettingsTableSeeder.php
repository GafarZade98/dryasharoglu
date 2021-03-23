<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        DB::table('settings')->insert(
            [
                [

                    'settings_descriptions' => 'Hakkımızda',
                    'settings_key' => 'about',
                    'settings_value' => 'Ecms Lorem Ipsum&nbsp;is simply dummy',
                    'settings_type' => 'text',
                    'settings_must' => 0,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Logo',
                    'settings_key' => 'logo',
                    'settings_value' => '6028dfe6a336d',
                    'settings_type' => 'file',
                    'settings_must' => 1,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Harita',
                    'settings_key' => 'map',
                    'settings_value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3034.4759570927617!2d50.12935331560486!3d40.486857059295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40305f02f6d4e569%3A0x97d72cb16c5c4f06!2zRW1iYXdvb2QgTcmZcmTJmWthbiBtYcSfYXphc8Sx!5e0!3m2!1str!2s!4v1616327736210!5m2!1str!2s',
                    'settings_type' => 'text',
                    'settings_must' => 2,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Misyon',
                    'settings_key' => 'mission',
                    'settings_value' => 'Lorem Ipsum&nbsp;is simply dummy',
                    'settings_type' => 'ckeditor',
                    'settings_must' => 3,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Vision',
                    'settings_key' => 'vision',
                    'settings_value' => 'Lorem Ipsum&nbsp;is simply dummy laravel,ecms,php',
                    'settings_type' => 'ckeditor',
                    'settings_must' => 4,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Hakkımızda Resim',
                    'settings_key' => 'hakkimizda_file',
                    'settings_value' => '602e643ae6183.jpg',
                    'settings_type' => 'file',
                    'settings_must' => 5,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Telefon',
                    'settings_key' => 'phone',
                    'settings_value' => '994773199324',
                    'settings_type' => 'text',
                    'settings_must' => 6,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Mail',
                    'settings_key' => 'mail',
                    'settings_value' => 'qafarzade2020@gmail.com',
                    'settings_type' => 'text',
                    'settings_must' => 7,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Gizlilik',
                    'settings_key' => 'privacy',
                    'settings_value' => 'qafarzade2020@gmail.com',
                    'settings_type' => 'text',
                    'settings_must' => 11,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Satış Sözleşmesi',
                    'settings_key' => 'contract',
                    'settings_value' => 'qafarzade2020@gmail.com',
                    'settings_type' => 'text',
                    'settings_must' => 12,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Cayma Hakkı',
                    'settings_key' => 'withdrawal',
                    'settings_value' => 'qafarzade2020@gmail.com',
                    'settings_type' => 'text',
                    'settings_must' => 12,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'settings_descriptions' => 'Açık Adres',
                    'settings_key' => 'address',
                    'settings_value' => 'İstanbul\Kadıköy\Atatürk cad\Turan mah\Dostlar sitesi\C blok\no 3',
                    'settings_type' => 'text',
                    'settings_must' => 10,
                    'settings_delete' => '0',
                    'settings_status' => '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            ]
        );
    }
}
