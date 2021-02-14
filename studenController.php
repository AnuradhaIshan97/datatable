<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class studenController extends Controller
{

    function getData(Request $request)
    {

        $data = student::all();

        $rerList = collect();

        $no = 0;
        foreach ($data as $k => $v) {
            $req = collect();
            $req->put('details', $v);
            $req->put('number', ++$no);
            $rerList->push($req);
        }

        return datatables()->of($rerList)
            ->addColumn('no', function ($row) {
                $dt = $row['number'];
                return $dt;
            })
            ->addColumn('name', function ($row) {
                $dt = $row['details']->name;
                return $dt;
            })
            ->addColumn('email', function ($row) {
                $dt = $row['details']->email;
                return $dt;
            })
            ->addColumn('phone', function ($row) {
                $dt = $row['details']->phone;
                return $dt;
            })
            ->addColumn('DOB', function ($row) {
                $dt = $row['details']->DOB;
                return $dt;
            })
            ->rawColumns([])
            ->toJson();


    }
}
