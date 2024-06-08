<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->checkout(['price_1PPYfKG3Jq03eKeOO5gML7qI' => 1], [
            'success_url' => route('app.settings.billing.index'),
            'cancel_url' => route('app.settings.billing.index'),
        ]);
    }
}
