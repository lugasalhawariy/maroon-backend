<?php

namespace App\Http\Controllers\API;

// data yang dibutuhkan
use App\Models\Kader;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaderController extends Controller
{
    public function all()
    {
        $data = Kader::all();

        if($data){
            return ResponseFormatter::success($data, 'Data kader berhasil diambil');
        }else{
            return ResponseFormatter::error(null, 'Data kader tidak ada', 404);
        }
    }
}
