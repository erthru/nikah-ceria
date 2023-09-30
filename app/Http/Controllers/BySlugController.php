<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\InvitationEvent;
use App\Models\InvitationGift;
use App\Models\InvitationGuest;
use Carbon\Carbon;
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
            'invitationEvents' => $invitationEvents,
            'invitationGifts' => $invitationGifts
        ]);
    }
}
