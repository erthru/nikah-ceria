<?php

namespace App\Http\Controllers\dashboard\invitations\byId;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\InvitationEvent;
use App\Models\InvitationGift;
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
        $invitationGifts = InvitationGift::where('invitation_id', $id)->orderBy('id', 'asc')->get();

        return view('pages.dashboard.invitations.byId.other', [
            'title' => 'Detail Invitation',
            'invitation' => $invitation,
            'invitationEvents' => $invitationEvents,
            'invitationGuests' => $invitationGuests,
            'invitationGifts' => $invitationGifts
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

        if ($ca == 'addGift') {
            return $this->customActionPostAddGift($id, $request);
        }

        return redirect('/dashboard/invitations/' . $id . '/other')->with('errorMessage', 'Aksi tidak valid');
    }

    public function customActionPut(String $id, Request $request): RedirectResponse
    {
        $ca = $request->query('ca');

        if ($ca == 'updateEvent') {
            return $this->customActionPutUpdateEvent($id, $request);
        }

        if ($ca == 'updateGuest') {
            return $this->customActionPutUpdateGuest($id, $request);
        }

        if ($ca == 'updateGift') {
            return $this->customActionPutUpdateGift($id, $request);
        }

        return redirect('/dashboard/invitations/' . $id . '/other')->with('errorMessage', 'Aksi tidak valid');
    }

    public function customActionDelete(String $id, Request $request): RedirectResponse
    {
        $ca = $request->query('ca');

        if ($ca == 'deleteEvent') {
            return $this->customActionDeleteDeleteEvent($id, $request);
        }

        if ($ca == 'deleteGuest') {
            return $this->customActionDeleteDeleteGuest($id, $request);
        }

        if ($ca == 'deleteGift') {
            return $this->customActionDeleteDeleteGift($id, $request);
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
            'code' => time() . chr(rand(97, 122)) . '-' . chr(rand(97, 122)) . '-' . chr(rand(97, 122)),
            'name' => $name,
            'invitation_id' => $id
        ]);

        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Tamu berhasil ditambahkan');
    }

    private function customActionPostAddGift(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $bank = $request->input('bank');
        $account_holder = $request->input('account_holder');
        $account_number = $request->input('account_number');

        InvitationGift::create([
            'bank' => $bank,
            'account_holder' => $account_holder,
            'account_number' => $account_number,
            'invitation_id' => $id
        ]);

        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Gift Digital berhasil ditambahkan');
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

        InvitationEvent::findOrFail($invitationEventId)->update([
            'name' => $name,
            'event_at' => $event_at,
            'place' => $place,
            'address' => $address,
            'latitude' => str_replace(',', '.', $latitude),
            'longitude' => str_replace(',', '.', $longitude),
        ]);

        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Acara berhasil diperbarui');
    }

    public function customActionPutUpdateGuest(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $invitationGuestId = $request->query('invitationGuestId');
        $name = $request->input('name');

        InvitationGuest::findOrFail($invitationGuestId)->update([
            'name' => $name,
        ]);

        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Tamu berhasil diperbarui');
    }

    private function customActionPutUpdateGift(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $invitationGiftId = $request->query('invitationGiftId');
        $bank = $request->input('bank');
        $account_holder = $request->input('account_holder');
        $account_number = $request->input('account_number');

        InvitationGift::findOrFail($invitationGiftId)->update([
            'bank' => $bank,
            'account_holder' => $account_holder,
            'account_number' => $account_number,
        ]);

        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Gift Digital berhasil diperbarui');
    }

    private function customActionDeleteDeleteEvent(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $invitationEventId = $request->query('invitationEventId');
        InvitationEvent::destroy($invitationEventId);
        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Acara berhasil dihapus');
    }

    private function customActionDeleteDeleteGuest(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $invitationGuestId = $request->query('invitationGuestId');
        InvitationGuest::destroy($invitationGuestId);
        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Tamu berhasil dihapus');
    }

    private function customActionDeleteDeleteGift(String $id, Request $request): RedirectResponse
    {
        $invitation = Invitation::with(['product', 'customer'])->findOrFail($id);
        $this->authorize('update-invitation', $invitation);
        $invitationGiftId = $request->query('invitationGiftId');
        InvitationGift::destroy($invitationGiftId);
        return redirect('/dashboard/invitations/' . $id . '/other')->with('successMessage', 'Gift Digital berhasil dihapus');
    }
}
