<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Resources\LeadResource;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $query = Lead::query();

        $query->when(
            $request->email,
            fn ($q, $email) =>
                $q->where('email', 'like', "%{$email}%")
        );

        $query->when(
            $request->status,
            fn ($q, $status) =>
                $q->where('status', $status)
        );

        $query->when(
            $request->source,
            fn ($q, $source) =>
                $q->where('source', $source)
        );

        $query->when(
            $request->start_date,
            fn ($q, $date) =>
                $q->whereDate('created_at', '>=', $date)
        );

        $query->when(
            $request->end_date,
            fn ($q, $date) =>
                $q->whereDate('created_at', '<=', $date)
        );

        return LeadResource::collection($query->latest()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeadRequest $request)
    {
        $lead = Lead::create(
            $request->validated()
        );

        return new LeadResource($lead);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        return response()->json(
            $lead->load('notes')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest $request,Lead $lead)
    {
       $lead->update(
            $request->validated()
        );

        return new LeadResource($lead);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return response()->json([
            'message' => 'Lead eliminado'
        ]);
    }
}
