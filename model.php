<?php

namespace App\Models\BaoCao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class danhgiacovid extends Model
{
    use HasFactory;

    public static function getReport($startDate, $endDate) {
        $report = DB::select('call BaoCaoTinhHinhCovid(?,?)', array($startDate, $endDate));

        return $report;
    }
}
