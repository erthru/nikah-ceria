<?php

namespace App\Http\Controllers\dashboard\invitations\detail;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\InvitationEvent;
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
}
