<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lokasi;

class LokasiNewController extends Controller
{
    public function apiIndex(Request $request)
    {
        return Lokasi::when($request->propinsi, function($query) use ($request) {

                    $propinsi = Lokasi::find($request->propinsi);
                    return $query->kota()->where('propinsi', $propinsi->propinsi);

                })->when($request->kota, function($query) use ($request) {

                    $kota = Lokasi::find($request->kota);
                    return $query->kecamatan()
                            ->where('propinsi', $kota->propinsi)
                            ->where('kota', $kota->kota);

                })->when($request->kecamatan, function($query) use ($request) {

                    $kecamatan = Lokasi::find($request->kecamatan);
                    return $query->kelurahan()
                            ->where('kecamatan', $kecamatan->kecamatan)
                            ->where('kota', $kecamatan->kota)
                            ->where('propinsi', $kecamatan->propinsi);

                })->orderBy('nama')->pluck('nama', 'id');
    }
}
