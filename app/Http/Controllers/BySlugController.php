<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\InvitationEvent;
use App\Models\InvitationGift;
use App\Models\InvitationGuest;
use App\Models\InvitationGuestBook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BySlugController extends Controller
{
    public function show(String $slug, Request $request): View
    {
        $igc = $request->query('igc');
        $invitation = Invitation::with(['customer', 'product'])->where('slug', $slug)->first();

        if (!$invitation || ($invitation && !$invitation->is_published)) {
            return abort(404);
        }

        $invitationGuest = InvitationGuest::where('invitation_id', $invitation->id)->where('code', $igc)->first();
        $invitationGuestBooks = InvitationGuestBook::with('invitationGuest')->where('invitation_id', $invitation->id)->latest()->get();
        $invitationEvents = InvitationEvent::where('invitation_id', $invitation->id)->orderBy('event_at', 'asc')->get();
        $invitationGifts = InvitationGift::where('invitation_id', $invitation->id)->get();

        if (count($invitationEvents) === 0) {
            return abort(404);
        }

        if (!$invitationGuest) {
            return abort(404);
        }

        return view('pages.bySlug', [
            'title' => $invitation->name,
            'invitation' => $invitation,
            'invitationGuest' => $invitationGuest,
            'invitationGuestBooks' => $invitationGuestBooks,
            'invitationEvents' => $invitationEvents,
            'invitationGifts' => $invitationGifts
        ]);
    }

    public function store(String $slug, Request $request): RedirectResponse
    {
        $message = $request->input('message');
        $igc = $request->query('igc');
        $invitation = Invitation::with(['customer', 'product'])->where('slug', $slug)->first();

        if (!$invitation || ($invitation && !$invitation->is_published)) {
            return abort(404);
        }

        $invitationGuest = InvitationGuest::where('invitation_id', $invitation->id)->where('code', $igc)->first();

        InvitationGuestBook::create([
            'message' => $message,
            'invitation_guest_id' => $invitationGuest->id,
            'invitation_id' => $invitation->id
        ]);


        return redirect('/' . $slug . '?igc=' . $igc . '#guestBooks');
    }
}
