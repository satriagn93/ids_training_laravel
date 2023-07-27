<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\KaryawanDetail;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function store(Request $request)
    {
        $KaryawanDetail = new KaryawanDetail;
        $KaryawanDetail->nik  = $request->nik;
        $KaryawanDetail->npwp = $request->npwp;
        if ($KaryawanDetail->save()) {
            $detail = $request->input();
            $header = DB::table('karyawan_detail')->latest('id')->first();
            foreach ($detail['data_karyawan'] as $key => $value) {
                $karyawan = new Karyawan;
                $karyawan->karyawan_detail_id = $header->id;
                $karyawan->address = $value['address'];
                $karyawan->dob = $value['dob'];
                $karyawan->name = $value['name'];
                $karyawan->status = $value['status'];
                $karyawan->save();
            }
            return response()->json(['message' => 'Karyawan add successfully']);
        }
    }

    public function getall()
    {
        $posts = KaryawanDetail::with('karyawan')->get();
        return response([
            $posts
        ]);
    }
}
