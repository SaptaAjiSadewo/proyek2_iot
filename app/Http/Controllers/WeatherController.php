<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $city = 'Indramayu'; // Nama kota
        $apiKey = '1b65757f24184cc806ccc56deee8d22d'; // Ganti dengan API Key Anda
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}";

        try {
            // Mengambil data dari API
            //$response = Http::get($url);
            $response = Http::withOptions(['verify' => false])->get($url);
            $data = $response->json();

            if ($response->successful()) {
                // Kirim data ke view
                return view('weather', ['data' => $data, 'error' => null]);
            } else {
                return view('weather', ['data' => null,'error' => 'Gagal mengambil data dari API.']);
            }
        } catch (\Exception $e) {
            return view('weather', ['data' => null,'error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
