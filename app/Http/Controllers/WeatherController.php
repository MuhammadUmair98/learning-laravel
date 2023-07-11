<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'longitude' => 'required',
            'latitude' => 'required',
        ]);
        $response = Http::post('https://api.open-meteo.com/v1/forecast', [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'current_weather' => true
        ]);


        if ($response->successful()) {
            return response()->json(['success' => true, 'data' => $response->json()]);
        }

        return response()->json(['success' => false]);
    }
}
