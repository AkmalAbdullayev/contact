<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Email;
use App\Models\MobileNumber;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::factory()
            ->count(15)
            ->has(Email::factory()->count(3), 'emails')
            ->has(MobileNumber::factory()->count(3), 'mobile_numbers')
            ->create();
    }
}
