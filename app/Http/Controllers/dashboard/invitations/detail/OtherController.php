<?php

namespace App\Http\Controllers\dashboard\invitations\detail;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\InvitationEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OtherController extends Controller
{
    public function show(String $id): View
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('show-invitation', $invitation);
        $invitationEvents = InvitationEvent::where('invitation_id', $id)->orderBy('id', 'asc')->get();

        return view('pages.dashboard.invitations.detail.other', [
            'title' => 'Detail Invitation',
            'invitation' => $invitation,
            'invitationEvents' => $invitationEvents
        ]);
    }

    public function customActionPost(String $id, Request $request): RedirectResponse
    {
        $ca = $request->query('ca');

        if ($ca == 'addEvent') {
            return $this->customActionPostAddEvent($id, $request);
        }

        return redirect('/dashboard/invitations/' . $id . '/other')->with('errorMessage', 'Aksi tidak valid');
    }

    private function customActionPostAddEvent(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $name = $request->input('name');
        $event_at = $request->input('event_at');
        $place = $request->input('place');
        $address = $request->input('address');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        InvitationEvent::create([
            'name' => $name,
            'event_at' => $event_at,
            'place' => $place,
            'address' => $address,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'invitation_id' => $id
        ]);

        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Acara berhasil ditambahkan');
    }
}
