<?php

namespace App\Http\Controllers\BaoCao;

use App\Http\Controllers\Controller;
use App\Models\BaoCao\danhgiacovid;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DanhGiaCovidController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $filterParams = \Arr::except($request->all(), array('_token', '_method'));

            if (!empty($filterParams)) {
                $startDate = $filterParams['start_date'];
                $endDate = $filterParams['end_date'];
                $data = danhgiacovid::getReport($startDate, $endDate);
            }

            return DataTables::of($data)
                ->addColumn('chitiet', function ($row) {
                    return "<a class='btn btn-sm btn-primary' href='/baocao/danhgiacovid/{$row->khaosat_id}'><i class='fas fa-arrow-circle-right'></i></a>";
                })
                ->rawColumns(['chitiet'])->make(true);
        }

        return view('pages.baocao.danhgiacovid');
    }
}


CHÀO THẰNG PHÚC