<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NoaaForecastService
{
    public static function fetchAndParse()
    {
        $url = 'https://services.swpc.noaa.gov/text/3-day-forecast.txt';
        $response = Http::get($url);

        if (!$response->ok()) {
            return null;
        }

        $text = $response->body();
        $lines = preg_split('/\r\n|\r|\n/', $text);

        $sections = [
            'product' => '',
            'geomagnetic' => '',
            'solar' => '',
            'radio' => '',
        ];

        $currentSection = 'product';

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '') continue;

            // Switch section when a header is detected
            if (stripos($line, 'A. NOAA Geomagnetic') !== false) {
                $currentSection = 'geomagnetic';
            } elseif (stripos($line, 'B. NOAA Solar Radiation') !== false) {
                $currentSection = 'solar';
            } elseif (stripos($line, 'C. NOAA Radio Blackout') !== false) {
                $currentSection = 'radio';
            }

            // Append line to current section
            $sections[$currentSection] .= $line . "\n";
        }

        return $sections;
    }
}
