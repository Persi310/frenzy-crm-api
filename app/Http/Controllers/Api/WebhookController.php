<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;

class WebhookController extends Controller
{
    public function store(
        StoreLeadRequest $request
    ) {
        $lead = Lead::create([
            ...$request->validated(),
            'status' => 'nuevo'
        ]);

        return response()->json([
            'message' => 'Lead recibido',
            'lead' => $lead
        ], 201);
    }
}
