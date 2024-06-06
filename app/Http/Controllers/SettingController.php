<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;

class SettingController extends Controller
{
    public function index()
    {
        return inertia('Settings/Index');
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->user()->update($request->validated());

        return to_route('app.settings.index');
    }

    public function theme()
    {
        return inertia('Settings/Theme');
    }

    public function billing()
    {
        return inertia('Settings/Billing');
    }
}
