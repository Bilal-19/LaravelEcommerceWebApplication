<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeRecord = Faker::create();
        for ($i = 0; $i <= 5; $i++) {
            $customer = new User();
            $customer->name = $fakeRecord->name;
            $customer->email = $fakeRecord->email;
            $customer->usertype = 'user';
            $customer->phone = $fakeRecord->phoneNumber;
            $customer->address = $fakeRecord->address;
            $customer->password = $fakeRecord->password;
            $customer->save();
        }
    }
}
