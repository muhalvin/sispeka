<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class NikahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $sql = DB::table('jadwals')
            ->where('tanggal', '>', now())
            ->get();

        $nikah = $sql->count(); // Count the number of records returned

        return $this->chart->pieChart()
            ->setTitle('Jadwal Nikah Akan Datang')
            ->setSubtitle(date('Y'))
            ->addData([$nikah]) // Wrap the count in an array to pass it as data for the pie chart
            ->setLabels(['Akad Nikah']);
    }
}
