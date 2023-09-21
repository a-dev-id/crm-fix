<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('villas')->delete();

        $villas = array(
            array('title' => 'VOLCANO VISTA VILLA', 'description' => 'The opulent 89 sqm villa features a king size bed with elegant bedding facing outwards and reveals inspiring lush pool and jungle views and onto the outdoor living area and into a separate bathroom including rain shower and a specially designed terrazzo bathtub with fully equipped luxury amenities.', 'image' => 'https://elevatebali.com/storage/wTC2Xc4XWPTO0jBdTFb3v0LFKYn7JH-metaNjM2MDk3ZTg3OTY4MTk5NTAyNjM3My5qcGc=-.jpg', 'status' => '1'),
            array('title' => 'VOLCANO PANORAMA VILLA', 'description' => 'These luxurious 97 sqm duplex villas on two levels take full advantage of the peace and tranquility of the surrounding jungle and mist covered mountains, with views that create unforgettable memories. Designed in an authentic Balinese style the villas feature 1 king 200cm on lower level and 1full size 160cm on upper level. This stylish villa features into a separate bathroom including rain shower and a specially designed terrazzo bathtub and jacuzzi with fully equipped luxury amenities. The ideal place to unwind and soak up the sights and sounds of the surrounding jungle.', 'image' => 'https://elevatebali.com/storage/hfijk1BdkGBO1LQ7GbfokDlE5pI8sT-metaNjM2MDk4Njg0NmIwZTAxNjE0MzQ4NC5qcGc=-.jpg', 'status' => '1'),
            array('title' => 'MOUNTAIN INFINITY POOL VILLA', 'description' => 'Ideal for families the 163 sqm duplex villas on two levels take full advantage of the peace and tranquility of the surrounding jungle and mist covered mountains. Designed in an authentic Balinese style the villas feature 1 King bed 200cm on lower level and 2 twin beds 120cm on upper level with a separate indoor and outdoor bathroom including rain shower and a specially designed terrazzo bathtub with fully equipped luxury amenities. With floor to ceiling windows on both floors and a large terrace, private infinity pool and a poolside gazebo these villas offer guests the ultimate luxurious stay.', 'image' => 'https://elevatebali.com/storage/zQ9OHOYydVfv71iMK09Gg4B717ttWw-metaNjM2MDk4Zjk1YzczNDI1MDc0MDI0Ni5qcGc=-.jpg', 'status' => '1'),
            array('title' => 'GRAND VIEW POOL VILLA', 'description' => 'Set amongst the hotels terraced gardens with the panoramic views of the valley, each duplex Suite Pool Villa lets you hide away in total privacy, whilst enjoying the beauty of its own infinity pool. The bathroom includes a rain shower and a specially designed terrazzo bathtub with fully equipped luxury amenities as well as a self-indulgent jacuzzi. Designed in contemporary Balinese style the roomy bedrooms featuring 1Super King bed 220cm on lower level and 2 twin beds 120cm on upper level are decorated with locally-spun silks and natural cottons, which perfectly blend style and comfort.', 'image' => 'https://elevatebali.com/storage/x3mtNKw2SuRt6RsrrMVsLNUFv0A0PR-metaNjM2MDk5MzFjYTJiZDgxMzY2MDYyOS5qcGc=-.jpg', 'status' => '1'),
            array('title' => 'PRESIDENTIAL VILLA', 'description' => 'The luxurious 184 villa features 2 bedrooms on the same level with 1 King bed 200cm in each room each bedecked in elegant bedding, The outdoor living area reveals inspiring lush pool and jungle views. A separate bathroom includes a rain shower and a specially designed terrazzo bathtub with fully equipped luxury amenities. With floor to ceiling windows and a large terrace, private infinity pool and a poolside gazebo these villas offer guests the ultimate in luxury accommodation', 'image' => 'https://elevatebali.com/storage/9eeAkKZRmHAiZownwKExSxes3kByLR-metaNjM2MDk4YmE2NDlhNTk1MTUwMjU5Ni5qcGc=-.jpg', 'status' => '1'),
        );

        DB::table('villas')->insert($villas);
    }
}
