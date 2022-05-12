<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::whereName('customer')->first()->users->first();
        $offer = Offer::create([
            'name'  => ['ar' => 'عرض خاص', 'en' => 'special offer'],
            'discount'  => 0,
            'type'  => 'precent',
            'started_at' => now(),
            'ended_at'  => now()->addYear(),
        ]);

        $user->reservations()->create(
            [
                'room_id'       => 3,
                'paid'          => 0,
                'started_at'    => now(),
                'ended_at'      => now()->addDays(20),
                'price'         => 100,
                'offer_id'      => $offer->id,
            ]
        );
    }
}
