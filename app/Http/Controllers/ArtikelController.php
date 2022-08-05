<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    //

    public function index()
    {
        $artikels = Artikel::orderBy('id', 'desc')->get();

        foreach ($artikels as $artikel) {
            $artikel->foto = url('public/artikel/' . $artikel->foto);

            $artikel->tanggal_upload = date('d-m-Y', strtotime($artikel->created_at));
        }

        if ($artikels) {
            return response()->json([
                'code' => Response::HTTP_OK,
                'artikels' => $artikels
            ]);
        } else {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => "Data tidak ditemukan"
            ]);
        }
    }

    public function store(Request $request)
    {

        // $file = $request->input('file_gambar');
        // $nama_file = time().".jpeg";
        //     $extension = $request->file('foto');
        //     $filenameSimpan = 'artikel' . '_' . time() . '.' . $extension;
        // 	$tujuan_upload = 'public/artikel/';


        //   file_put_contents($tujuan_upload . $filenameSimpan , base64_decode($extension));

        // if ($request->hasFile('foto')) {

        $extension = $request->file('foto')->getClientOriginalExtension();
        $filenameSimpan = 'artikel' . '_' . time() . '.' . $extension;
        $path = $request->file('foto')->move('public/artikel', $filenameSimpan);

        // } else {
        //     $filenameSimpan = "tidak_ada.jpg";
        // }

        $artikel = new Artikel();
        $artikel->judul = request('judul');
        $artikel->isi = request('isi');
        $artikel->foto = $filenameSimpan;
        $artikel->link_youtube = request('link_youtube');
        $artikel->link_worksheet = request('link_worksheet');
        $artikel->guru_id = request('guru_id');
        $artikel->save();

        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => "Data berhasil ditambahkan"
        ]);
    }

    public function show($id)
    {
        $artikel = Artikel::where('id', $id)->first();
        if($artikel->foto!=null){
        $artikel->foto = url('public/artikel/' . $artikel->foto);
        }
        $artikel->tanggal_upload = date('d-m-Y', strtotime($artikel->created_at));

        if ($artikel) {
            return response()->json([
                'code' => Response::HTTP_OK,
                'artikel' => $artikel
            ]);
        } else {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => "Data tidak ditemukan"
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->hasFile('foto')) {

            $artikel = Artikel::find($id);


            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSimpan = 'artikel' . '_' . time() . '.' . $extension;
            File::delete('public/artikel'. '/' . Artikel::find($id)->foto);
            $path = $request->file('foto')->move('public/artikel', $filenameSimpan);

           


            $artikel->update([
                'judul' => request('judul'),
                'isi' => request('isi'),
                'foto' => $filenameSimpan,
                'link_youtube' => request('link_youtube'),
                'link_worksheet' => request('link_worksheet'),
                'guru_id' => request('guru_id')
            ]);
        } else {

            $artikel = Artikel::find($id);


            $artikel->update([
                'judul' => request('judul'),
                'isi' => request('isi'),
                'link_youtube' => request('link_youtube'),
                'link_worksheet' => request('link_worksheet'),
                'guru_id' => request('guru_id')
            ]);
        }

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => "Data berhasil diubah"
        ]);
    }

    public function destroy($id)
    {
        $artikel = Artikel::find($id);
      
        if ($artikel) {
            File::delete('public/artikel'. '/' . Artikel::find($id)->foto);
            $artikel->delete();
            return response()->json([
                'code' => Response::HTTP_OK,
                'message' => "Data berhasil dihapus"
            ]);
        } else {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => "Data tidak ditemukan"
            ]);
        }
       
    }
}
