<?php

namespace App\Http\Controllers\sysadmin;

use Illuminate\Http\Request;
use App\Models\skklweb\LinkUtube;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WebConfigController extends Controller
{
    public function linkUtubeNoSign()
    {
        $utube  = LinkUtube::first();
        return view('sysadmin/skklweb/link_utube_nosign', compact('utube'));
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
}
