<?php

namespace App\Http\Controllers\sysadmin;

use App\Http\Controllers\Controller;
use App\Models\skklweb\LinkUtube;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class WebConfigController extends Controller
{
    public function linkUtubeNoSign()
    {
        $utube  = LinkUtube::first();
        #return view('sysadmin/skklweb/link_utube_nosign', compact('utube'));
        return view('sysadmin/skklweb/create_link_upload', compact('utube'));
    }

    public function linkUtubeNoSignUpdate(Request $request, $id)
    {
        LinkUtube::findOrFail($id);
        try {
            LinkUtube::where('id', $id)
                ->update([
                    'link_utube'      => $request->link_utube,
                    'keterangan'     => $request->keterangan,
                    'sub_header'       => $request->sub_header,
                ]);
            Alert::toast('Link Utube berhasil diupdate.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->route('web.linkutube');
    }

    public function linkUtube()
    {
        $utube  = LinkUtube::first();
        return view('sysadmin/skklweb/link_utube', compact('utube'));
    }

    public function linkUtubeUpdate(Request $request, $id)
    {
        LinkUtube::findOrFail($id);
        try {
            LinkUtube::where('id', $id)
                ->update([
                    'link_utube'      => $request->link_utube,
                    'keterangan'     => $request->keterangan,
                    'sub_header'       => $request->sub_header,
                ]);
            Alert::toast('Link Utube berhasil diupdate.', 'success')->width('25rem')->padding('5px');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->route('admin.web.linkutube');
    }

    /* public function index()
    {
        return view('sysadmin/skklweb/create_link_upload');
    } */

    public function store(Request $request)
    {
        if ($request->hasFile('filepond')) {
            $file = $request->file('filepond');
            $kategori = $request->query('kategori', 'default'); 

            if (!in_array($kategori, ['wj', 'taib'])) {
                return response()->json(['error' => 'Kategori tidak valid.'], 400);
            }

            // 1. VALIDASI: Pastikan ekstensi file wajib PDF
            $extension = strtolower($file->getClientOriginalExtension());
            if ($extension !== 'pdf') {
                return response()->json(['error' => 'Hanya file format PDF yang diperbolehkan.'], 422);
            }

            // 2. Buat nama file permanen (karena pasti PDF, langsung kunci ekstensinya)
            $permanentName = "file_{$kategori}.pdf";
            
            $targetPath = "public/{$kategori}/file_{$kategori}.pdf";

            if (Storage::exists($targetPath)) {
                Storage::delete($targetPath);
            }

            // 4. Simpan file baru
            $path = $file->storeAs("public/{$kategori}", $permanentName);

            #return response($path, 200)->header('Content-Type', 'text/plain');
            // SEKARANG:
            return response($file->getClientOriginalName(), 200)->header('Content-Type', 'text/plain');
        }

        return response()->json(['error' => 'Tidak ada file.'], 400);
    }
}
