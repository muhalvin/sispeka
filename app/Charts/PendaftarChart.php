<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class PendaftarChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $proses = DB::table('pendaftaran')->where('status', '=', 1)->count();
        $selesai = DB::table('pendaftaran')->where('status', '=', 2)->count();
        $tolak = DB::table('pendaftaran')->where('status', '=', 3)->count();

        $data = [$proses, $selesai, $tolak];

        $labels = ['Proses', 'Selesai', 'Ditolak'];

        return $this->chart->donutChart()
            ->setTitle('Pendaftaran')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels($labels);
    }
}
