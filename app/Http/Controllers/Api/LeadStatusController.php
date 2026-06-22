<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeLeadStatusRequest;
use App\Models\Lead;

class LeadStatusController extends Controller
{
    public function update(
        ChangeLeadStatusRequest $request,
        Lead $lead
    ) {
        $lead->update([
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Estado actualizado',
            'lead' => $lead
        ]);
    }
}
