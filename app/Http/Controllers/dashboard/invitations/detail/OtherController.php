<?php

namespace App\Http\Controllers\dashboard\invitations\detail;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\InvitationEvent;
use App\Models\InvitationGuest;
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
        $invitationGuests = InvitationGuest::where('invitation_id', $id)->orderBy('id', 'asc')->get();

        return view('pages.dashboard.invitations.detail.other', [
            'title' => 'Detail Invitation',
            'invitation' => $invitation,
            'invitationEvents' => $invitationEvents,
            'invitationGuests' => $invitationGuests
        ]);
    }

    public function customActionPost(String $id, Request $request): RedirectResponse
    {
        $ca = $request->query('ca');

        if ($ca == 'addEvent') {
            return $this->customActionPostAddEvent($id, $request);
        }

        if ($ca == 'addGuest') {
            return $this->customActionPostAddGuest($id, $request);
        }

        return redirect('/dashboard/invitations/' . $id . '/other')->with('errorMessage', 'Aksi tidak valid');
    }

    public function customActionPut(String $id, Request $request): RedirectResponse
    {
        $ca = $request->query('ca');

        if ($ca == 'updateEvent') {
            return $this->customActionPutUpdateEvent($id, $request);
        }

        return redirect('/dashboard/invitations/' . $id . '/other')->with('errorMessage', 'Aksi tidak valid');
    }

    public function customActionDelete(String $id, Request $request): RedirectResponse
    {
        $ca = $request->query('ca');

        if ($ca == 'deleteEvent') {
            return $this->customActionDeleteDeleteEvent($id, $request);
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
            'latitude' => str_replace(',', '.', $latitude),
            'longitude' => str_replace(',', '.', $longitude),
            'invitation_id' => $id
        ]);

        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Acara berhasil ditambahkan');
    }

    private function customActionPostAddGuest(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $name = $request->input('name');

        InvitationGuest::create([
            'code' => time() . substr($name, 0, 1) . '-' . substr($name, -1),
            'name' => $name,
            'invitation_id' => $id
        ]);

        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Tamu berhasil ditambahkan');
    }

    private function customActionPutUpdateEvent(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $invitationEventId = $request->query('invitationEventId');
        $name = $request->input('name');
        $event_at = $request->input('event_at');
        $place = $request->input('place');
        $address = $request->input('address');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        InvitationEvent::find($invitationEventId)->update([
            'name' => $name,
            'event_at' => $event_at,
            'place' => $place,
            'address' => $address,
            'latitude' => str_replace(',', '.', $latitude),
            'longitude' => str_replace(',', '.', $longitude),
        ]);

        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Acara berhasil diperbarui');
    }

    private function customActionDeleteDeleteEvent(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $invitationEventId = $request->query('invitationEventId');
        InvitationEvent::destroy($invitationEventId);
        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Acara berhasil dihapus');
    }
}
