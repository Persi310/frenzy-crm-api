<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\LeadNoteController;
use App\Http\Controllers\Api\LeadStatusController;
use App\Http\Controllers\Api\WebhookController;
use Illuminate\Support\Facades\Route;

Route::post(
    '/login',
    [AuthController::class, 'login']
);

Route::post(
    '/webhooks/leads',
    [WebhookController::class, 'store']
);

Route::middleware('auth:sanctum')
    ->group(function () {

        Route::apiResource(
            'leads',
            LeadController::class
        );

        Route::patch(
            'leads/{lead}/status',
            [LeadStatusController::class, 'update']
        );

        Route::post(
            'leads/{lead}/notes',
            [LeadNoteController::class, 'store']
        );
    });
