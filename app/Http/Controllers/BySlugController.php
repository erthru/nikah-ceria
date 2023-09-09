<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\InvitationGuest;
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

        if (!$invitationGuest) {
            return abort(404);
        }

        return view('pages.bySlug', [
            'title' => $invitation->name,
            'invitation' => $invitation,
            'invitationGuest' => $invitationGuest
        ]);
    }
}
