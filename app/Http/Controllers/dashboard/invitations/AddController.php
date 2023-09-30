<?php

namespace App\Http\Controllers\dashboard\invitations;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
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
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('act-as-customer');
        $name = $request->input('name');
        $male_name = $request->input('male_name');
        $female_name = $request->input('female_name');
        $male_father_name = $request->input('male_father_name');
        $male_mother_name = $request->input('male_mother_name');
        $female_father_name = $request->input('female_father_name');
        $female_mother_name = $request->input('female_mother_name');
        $male_family_order = $request->input('male_family_order');
        $female_family_order = $request->input('female_family_order');
        $male_photo = $request->file('male_photo');
        $female_photo = $request->file('female_photo');
        $caption_1 = $request->input('caption_1');
        $caption_2 = $request->input('caption_2');
        $gallery_1 = $request->file('gallery_1');
        $gallery_2 = $request->file('gallery_2');
        $gallery_3 = $request->file('gallery_3');
        $gallery_4 = $request->file('gallery_4');
        $gallery_5 = $request->file('gallery_5');
        $gallery_6 = $request->file('gallery_6');
        $gallery_7 = $request->file('gallery_7');
        $gallery_8 = $request->file('gallery_8');
        $song = $request->file('song');
        $is_published = $request->input('is_published');
        $product_id = $request->input('product_id');

        if (
            ($male_photo && $male_photo->getSize() / 1024 > 2000) ||
            ($female_photo && $female_photo->getSize() / 1024 > 2000) ||
            ($gallery_1 && $gallery_1->getSize() / 1024 > 2000) ||
            ($gallery_2 && $gallery_2->getSize() / 1024 > 2000) ||
            ($gallery_3 && $gallery_3->getSize() / 1024 > 2000) ||
            ($gallery_4 && $gallery_4->getSize() / 1024 > 2000) ||
            ($gallery_5 && $gallery_5->getSize() / 1024 > 2000) ||
            ($gallery_6 && $gallery_6->getSize() / 1024 > 2000) ||
            ($gallery_7 && $gallery_7->getSize() / 1024 > 2000) ||
            ($gallery_8 && $gallery_8->getSize() / 1024 > 2000) ||
            ($song && $song->getSize() / 1024 > 7000)
        ) {
            return redirect('/dashboard/invitations/add')->with('errorMessage', 'Ukuran file terlalu besar')->withInput();
        }

        $male_photoName = '';

        if ($male_photo) {
            $male_photoName = time() + 2 . '.' . $male_photo->getClientOriginalExtension();
            $male_photo->move(public_path('/uploads'), $male_photoName);
        }

        $female_photoName = '';

        if ($female_photo) {
            $female_photoName = time() + 3 . '.' . $female_photo->getClientOriginalExtension();
            $female_photo->move(public_path('/uploads'), $female_photoName);
        }

        $gallery_1Name = '';

        if ($gallery_1) {
            $gallery_1Name = time() + 4 . '.' . $gallery_1->getClientOriginalExtension();
            $gallery_1->move(public_path('/uploads'), $gallery_1Name);
        }

        $gallery_2Name = '';

        if ($gallery_2) {
            $gallery_2Name = time() + 5 . '.' . $gallery_2->getClientOriginalExtension();
            $gallery_2->move(public_path('/uploads'), $gallery_2Name);
        }

        $gallery_3Name = '';

        if ($gallery_3) {
            $gallery_3Name = time() + 6 . '.' . $gallery_3->getClientOriginalExtension();
            $gallery_3->move(public_path('/uploads'), $gallery_3Name);
        }

        $gallery_4Name = '';

        if ($gallery_4) {
            $gallery_4Name = time() + 7 . '.' . $gallery_4->getClientOriginalExtension();
            $gallery_4->move(public_path('/uploads'), $gallery_4Name);
        }

        $gallery_5Name = '';

        if ($gallery_5) {
            $gallery_5Name = time() + 8 . '.' . $gallery_5->getClientOriginalExtension();
            $gallery_5->move(public_path('/uploads'), $gallery_5Name);
        }

        $gallery_6Name = '';

        if ($gallery_6) {
            $gallery_6Name = time() + 9 . '.' . $gallery_6->getClientOriginalExtension();
            $gallery_6->move(public_path('/uploads'), $gallery_6Name);
        }

        $gallery_7Name = '';

        if ($gallery_7) {
            $gallery_7Name = time() + 10 . '.' . $gallery_7->getClientOriginalExtension();
            $gallery_7->move(public_path('/uploads'), $gallery_7Name);
        }

        $gallery_8Name = '';

        if ($gallery_8) {
            $gallery_8Name = time() + 11 . '.' . $gallery_8->getClientOriginalExtension();
            $gallery_8->move(public_path('/uploads'), $gallery_8Name);
        }

        $songName = '';

        if ($song) {
            $songName = time() + 12 . '.' . $song->getClientOriginalExtension();
            $song->move(public_path('/uploads'), $songName);
        }

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        $invitationWithTheSameSlug = Invitation::where('slug', $slug)->first();

        if ($invitationWithTheSameSlug) {
            $slug = $slug . '-' . time();
        }

        $invitation = Invitation::create([
            'name' => $name,
            'slug' => $slug,
            'male_name' => $male_name,
            'female_name' => $female_name,
            'male_father_name' => $male_father_name,
            'male_mother_name' => $male_mother_name,
            'female_father_name' => $female_father_name,
            'female_mother_name' => $female_mother_name,
            'male_family_order' => $male_family_order,
            'female_family_order' => $female_family_order,
            'male_photo' => $male_photoName,
            'female_photo' => $female_photoName,
            'caption_1' => $caption_1,
            'caption_2' => $caption_2,
            'gallery_1' => $gallery_1Name,
            'gallery_2' => $gallery_2Name,
            'gallery_3' => $gallery_3Name,
            'gallery_4' => $gallery_4Name,
            'gallery_5' => $gallery_5Name,
            'gallery_6' => $gallery_6Name,
            'gallery_7' => $gallery_7Name,
            'gallery_8' => $gallery_8Name,
            'song' => $songName,
            'is_published' => $is_published,
            'product_id' => $product_id,
            'customer_id' => Auth::user()->customer->id,
        ]);

        return redirect('/dashboard/invitations/' . $invitation->id)->with('successMessage', 'Berhasil membuat undangan');
    }
}
