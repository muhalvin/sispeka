<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class UsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $users = DB::table('users')
            ->where('role', '=', 'user')
            ->get();
        $admin = DB::table('users')
            ->where('role', '=', 'admin')
            ->get();
        $data = [
            $users->count(),
            $admin->count(),
        ];

        return $this->chart->pieChart()
            ->setTitle('Jumlah Users')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels(['Users', 'Admin']);
    }
}
