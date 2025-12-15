<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use setasign\Fpdi\Fpdi;

class GenerateDailyPdfFpdi extends Command
{
    protected $signature = 'pdf:generate-daily-fpdi';
    protected $description = 'Generate a daily PDF report using a 3-page PDF template (FPDI)';

    public function handle()
    {
        $templatePath = storage_path('app/templates/DailyReportTemplate.pdf');

        if (!file_exists($templatePath)) {
            $this->error("Template PDF not found at: " . $templatePath);
            return;
        }

        $pdf = new Fpdi();

        // Load the template and get page count
        $pageCount = $pdf->setSourceFile($templatePath);
        $pdf->SetTextColor(255, 0, 0);

        // Example dynamic values
        $date = now()->format('d-m-Y');
        $solarWindSpeed = "650 km/sec";
        $solarWindDensity = "2.7 protons/cm3";
        $kpIndex = "Kp=5.33 storm";
        $forecast = "Solar activity was low with a C3.8 flare. Forecast: G1 storming possible.";
        $conjunction = "Close approach predicted on 16-09-2025 at 01:23 UTC. Miss distance: 1032m.";

        // Loop through all pages
        for ($pageNo = 1; $pageNo <= $pageCount - 1; $pageNo++) {
            $pdf->AddPage();
            $tpl = $pdf->importPage($pageNo);
            $pdf->useTemplate($tpl, 0, 0, 210); // A4 width

            // Set font
            $pdf->SetFont('Helvetica', '', 12);
            $pdf->SetTextColor(0, 0, 0);

            // Write different data depending on page number
            if ($pageNo === 1) {
                $pdf->SetXY(150, 40);
                $pdf->Write(8, "Date: $date");


            }

            if ($pageNo === 2)
                {
                $pdf->SetXY(75, 48);
                $pdf->Write(10, $solarWindSpeed);



                $pdf->SetXY(80, 55);
                $pdf->Write(10, $solarWindDensity);


            }


        }

        // Save output
        $fileName = 'daily_report_' . now()->format('Y_m_d_His') . '.pdf';
        $outputPath = storage_path('app/reports/' . $fileName);
        $pdf->Output($outputPath, 'F');

        $this->info("PDF generated: " . $outputPath);
    }
}
