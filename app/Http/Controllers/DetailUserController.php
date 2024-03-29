<?php

namespace App\Http\Controllers;

use App\Models\Drainase;
use App\Models\Jalan;
use App\Models\Tanah;
use Illuminate\Http\Request;

class DetailUserController extends Controller
{
    public function detailUserTanahLahan($id){
        return view('detailUser.detail-tanah-lahan',[
            'title' => 'Detail Tanah dan Lahan',
            'tanah' => Tanah::findOrFail($id)
        ]);
    }
    public function detailUserRuasJalan($id){
        return view('detailUser.detail-ruas-jalan',[
            'title' => 'Detail Ruas Jalan',
            'jalan' => Jalan::findOrFail($id)
        ]);
    }
    public function detailUserDrainase($id){
        return view('detailUser.detail-drainase',[
            'title' => 'Detail Drainase',
            'drainase' => Drainase::findOrFail($id)
        ]);
    }
}
