<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Invitation;
use App\Models\InvitationEvent;
use App\Models\InvitationGift;
use App\Models\InvitationGuest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userAdmin = User::create([
            'email' => 'admin@nikahceria.com',
            'password' => bcrypt('123456'),
            'role' => 'ADMIN'
        ]);

        $userCustomer = User::create([
            'email' => 'customer@nikahceria.com',
            'password' => bcrypt('123456'),
            'role' => 'CUSTOMER'
        ]);

        Admin::create([
            'name' => 'Admin',
            'user_id' => $userAdmin->id
        ]);

        $customer = Customer::create([
            'name' => 'Customer',
            'user_id' => $userCustomer->id
        ]);

        for ($i = 0; $i < 4; $i++) {
            Product::create([
                'code' => 'b' . $i + 1,
                'name' => 'Basic Product ' . $i + 1,
                'description' => 'Basic product with basic theme & colors ' . $i + 1,
                'thumbnail' => 'placeholder.png',
                'price' => 0,
                'discount' => null,
                'discount_expires_at' => null,
                'demo_url' => '#',
                'is_active' => 1,
            ]);
        }

        $products = Product::orderBy('id', 'asc')->get();

        foreach ($products as $product) {
            Order::create([
                'invoice' => 'INV' . time() . rand(0, 100) . rand(101, 400),
                'status' => 'PAID',
                'final_price' => 0,
                'payment_method' => 'BANK_TRANSFER',
                'product_id' => $product->id,
                'customer_id' => $customer->id
            ]);

            $invitation = Invitation::create([
                'name' => 'Romeo & Juliet',
                'slug' => 'romeo-juliet-' . $product->code,
                'male_name' => 'Romeo',
                'female_name' => 'Juliet',
                'male_father_name' => 'Lord Montague',
                'male_mother_name' => 'Lady Montague',
                'female_father_name' => 'Lord Capuet',
                'female_mother_name' => 'Lady Capuet',
                'male_family_order' => 1,
                'female_family_order' => 1,
                'male_photo' => 'example-male.jpeg',
                'female_photo' => 'example-female.jpeg',
                'caption' => "Dalam hari yang indah ini, kami mengikatkan diri dalam janji abadi cinta dan kesetiaan. Di antara senyum bahagia, tawa yang tak terhitung, dan mata yang bercahaya, kami memulai babak baru dalam hidup kami bersama. Terima kasih kepada semua yang hadir dalam hari istimewa ini, yang telah membuatnya menjadi momen yang tak terlupakan. Kami berjanji untuk selalu bersama, melalui suka dan duka, dan untuk membangun masa depan yang penuh cinta dan harapan bersama. Ini adalah awal dari petualangan seumur hidup kami, dan kami sangat bersemangat untuk menghadapinya bersama-sama.",
                'gallery_1' => 'example-gallery-1.jpeg',
                'gallery_2' => 'example-gallery-2.jpeg',
                'gallery_3' => 'example-gallery-3.jpeg',
                'gallery_4' => 'example-gallery-4.jpeg',
                'gallery_5' => 'example-gallery-5.jpeg',
                'gallery_6' => 'example-gallery-6.jpeg',
                'gallery_7' => 'example-gallery-7.jpeg',
                'gallery_8' => 'example-gallery-8.jpeg',
                'song' => 'example-song.mp3',
                'is_published' => 1,
                'product_id' => $product->id,
                'customer_id' => $customer->id,
            ]);

            InvitationEvent::create([
                'name' => 'Akad',
                'event_at' => '2023-12-12T08:00',
                'place' => 'Rome',
                'address' => 'Via Giulia, 181',
                'latitude' => '41.8937196',
                'longitude' => '12.4680387',
                'invitation_id' => $invitation->id
            ]);

            InvitationGift::create([
                'bank' => 'Bank of Rome 1',
                'account_holder' => 'Romeo Holder',
                'account_number' => '1234567899',
                'invitation_id' => $invitation->id
            ]);

            InvitationGift::create([
                'bank' => 'Bank of Rome 2',
                'account_holder' => 'Juliet Holder',
                'account_number' => '1234567888',
                'invitation_id' => $invitation->id
            ]);

            $guest = InvitationGuest::create([
                'code' => time() . chr(rand(97, 122)) . '-' . chr(rand(97, 122)) . '-' . chr(rand(97, 122)),
                'name' => 'Mercutio',
                'invitation_id' => $invitation->id
            ]);

            Product::find($product->id)->update([
                'demo_url' => '/' . $invitation->slug . '?igc=' . $guest->code,
            ]);
        }
    }
}
