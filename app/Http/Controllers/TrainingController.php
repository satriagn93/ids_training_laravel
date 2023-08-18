<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Validator;

class TrainingController extends Controller
{
    public function store(Request $request)
    {
        //melakukan insert data 
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image_path = $request->file('file')->store('file', 'public');

        $members              = new Training;
        $members->pengajar    = $request->pengajar;
        $members->tema        = $request->tema;
        $members->file        = $image_path;

        //jika berhasil maka simpan data dengan methode $post->save()
        if ($members->save()) {
            return response()->json('Data Training Berhasil Disimpan');
        } else {
            return response()->json('Data Training Gagal Disimpan');
        }
    }

    public function getTraining()
    {
        $trainings  = Training::all();
        return response([
            $trainings
        ]);
    }

    public function getTrainingById($id)
    {
        $trainings = Training::findOrFail($id);
        return response([
            $trainings
        ]);
    }

    public function update(Request $request, $id)
    {
        $trainings = Training::findOrFail($id);
        $trainings->pengajar        = $request->pengajar;
        $trainings->tema          = $request->tema;

        if ($trainings->update()) {
            return response()->json('Data training berhasil di Update');
        } else {
            return response()->json('Gagal Update');
        }
    }

    public function destroy($id)
    {
        $training = Training::where('id', $id)->first();
        $training->delete();
        return response()->json([
            'success' => 'Data Successfully Deleted'
        ], 200);
    }

    public function getTrainingPagination(Request $request)
    {
        $per_page=10;
        if($request->has('per_page'))  $per_page=$request->per_page;

        $json['code']=200;
        $trainings = Training::paginate($per_page);
        $json['trainings']=$trainings;
        return response()->json($json);
    }
}
