<?php

namespace App\Http\Controllers\dashboard\invitations;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AddController extends Controller
{
    public function show(): View
    {
        $this->authorize('act-as-customer');
        $paidOrders = Order::with('product')->where('customer_id', Auth::user()->customer->id)->where('status', 'PAID')->get();
        $products = [];

        foreach ($paidOrders as $po) {
            array_push($products, $po->product);
        }

        return view('pages.dashboard.invitations.add', [
            'title' => 'Tambah Undangan',
            'products' => $products,
            'tempName' => 'Romeo & Juliet Wedding',
            'tempSlug' => 'romeo-and-juliet-wedding',
            'tempMaleName' => 'Romeo',
            'tempFemaleName' => 'Juliet',
            'tempMaleFatherName' => 'Naruto',
            'tempMaleMotherName' => 'Hinata',
            'tempFemaleFatherName' => 'Sasuke',
            'tempFemaleMotherName' => 'Sakura',
            'tempMaleFamilyOrder' => 1,
            'tempFemaleFamilyOrder' => 2,
            'tempMalePhoto' => 'romeo.jpg',
            'tempFemalePhoto' => 'juliet.jpg',
            'tempCaption1' => 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir. (QS. Ar-Rum 21)',
            'tempCaption2' => "Untuk Melaksanakan Syari'at Agama-Mu, Mengikuti Sunnah-Mu dalam membentuk keluarga yang  Sakinah, Mawaddah Wa Rohmah. Maka Izinkanlah kami menikahkannya.",
            'tempGallery1' => 'romeo-and-juliet-1.jpg',
            'tempGallery2' => 'romeo-and-juliet-2.jpg',
            'tempGallery3' => 'romeo-and-juliet-3.jpg',
            'tempGallery4' => 'romeo-and-juliet-4.jpg',
            'tempGallery5' => 'romeo-and-juliet-5.jpg',
            'tempGallery6' => 'romeo-and-juliet-6.jpg',
            'tempGallery7' => 'romeo-and-juliet-7.jpg',
            'tempGallery8' => 'romeo-and-juliet-8.jpg',
            'tempSong' => 'romeo-and-juliet-song.mp3',
        ]);
    }
}
