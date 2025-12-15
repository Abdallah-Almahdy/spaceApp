<?php

namespace App\Console\Commands;



use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use App\Services\NoaaForecastService;

class GenerateDailyPdf extends Command
{
    protected $signature = 'pdf:generate-daily';
    protected $description = 'Generate a daily PDF report';

    public function handle()
    {
        $forecast = NoaaForecastService::fetchAndParse();

        // Example data
        $data = [
            "forecast" => $forecast,
        ];


        // Load a blade view into the PDF
      $pdf = Pdf::loadView('pdf.daily-report', $data);

        // Save to storage/app/public/reports
        $fileName = 'daily_report_' . now()->format('Y_m_d_His') . '.pdf';
        Storage::put('reports/' . $fileName, $pdf->output());


        $this->info("PDF generated: " . $fileName);
    }
}
