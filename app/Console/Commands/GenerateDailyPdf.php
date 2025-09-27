<?php

namespace App\Console\Commands;


use Barryvdh\DomPDF\PDF;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Storage;

class GenerateDailyPdf extends Command
{
    protected $signature = 'pdf:generate-daily';
    protected $description = 'Generate a daily PDF report';

    public function handle()
    {
        // Example data
        $data = [
            'title' => 'Daily Report',
            'date' => now()->toDateString(),
            'time' => now()->toTimeString(),
        ];

        // Load a blade view into the PDF
        $pdf = app(PDF::class)->loadView('pdf.daily-report', $data);

        // Save to storage/app/public/reports
        $fileName = 'daily_report_' . now()->format('Y_m_d_His') . '.pdf';
        Storage::put('reports/' . $fileName, $pdf->output());


        $this->info("PDF generated: " . $fileName);
    }
}
