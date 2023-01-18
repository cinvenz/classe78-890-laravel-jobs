<?php

use Faker\Generator as Faker;
use App\Listing;
use Illuminate\Database\Seeder;

class ListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $rows = [
            [
                'title'     => 'Lavoro da casa per Laravel developers',
                'company'   => 'Microsoft',
                'address'   => 'Cupertino California',
                'salary'    => 35000,
                'urgent'    => false,
                'deadline'  => '2022-02-15',
            ],
            [
                'title'     => 'Lav Laravel developers',
                'company'   => 'Apple',
                'address'   => 'Cupertino California',
                'salary'    => 67000,
                'urgent'    => false,
                'deadline'  => '2022-02-26',
            ],
            [
                'title'     => 'Lavevelopers',
                'company'   => 'Facebook',
                'address'   => 'Silicon California',
                'salary'    => 50000,
                'urgent'    => true,
                'deadline'  => '2022-08-25',
            ],
        ];

        foreach ($rows as $row) {
            $listing = new Listing();
            $listing->title     = $row['title'];
            $listing->company   = $row['company'];
            $listing->address   = $row['address'];
            $listing->salary    = $row['salary'];
            $listing->urgent    = $row['urgent'];
            $listing->deadline  = $row['deadline'];
            $listing->save();
        }

        for ($i = 0; $i < 250; $i++) {
            $listing = new Listing();
            $listing->title = $faker->words(rand(2, 7), true);
            $listing->company = $faker->randomElement(['Microsoft', 'Meta', 'Apple', 'Snapchat', 'GitHub']);
            $listing->address = $faker->address();
            $listing->salary = rand(25000, 70000);
            $listing->urgent = [true, false][rand(0, 1)];
            $listing->deadline = $faker->date();
            $listing->save();
        }
    }
}
