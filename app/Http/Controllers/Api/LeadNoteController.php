<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadNoteRequest;
use App\Models\Lead;

class LeadNoteController extends Controller
{
   public function store(
        StoreLeadNoteRequest $request,
        Lead $lead
    ) {
        $note = $lead->notes()->create([
            'note' => $request->note
        ]);

        return response()->json(
            $note,
            201
        );
    }
}
