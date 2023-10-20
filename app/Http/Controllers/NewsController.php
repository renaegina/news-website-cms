<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //Membuat class
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = News::where('title', 'LIKE', '%' .$request->search. '%')->paginate(5);
        }else{
            $data = News::paginate(5);
        }

        $data = News::paginate(5);
        return view('datanews', compact('data'));
    }

    public function addnews()
    {
        return view('adddata');
    }

    public function insertdata(Request $request)
    {
        // dd($request->all());
        $data =  News::create($request->all());

        // Menambahkan foto/gambar
        if($request->hasFile('images')){
            $request->file('images')->move('newsimages/', $request->file('images')->getClientOriginalName());
            $data->images = $request->file('images')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('news')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function showdata($id)
    {
        $data = News::find($id);
        // dd($data);

        return view('showsdata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = News::find($id);
        $data->update($request->all());
        return redirect()->route('news')->with('success', 'Data Berhasil di Update');
    }

    public function deletedata($id)
    {
        $data = News::find($id);
        $data->delete();
        return redirect()->route('news')->with('success', 'Data Berhasil di Delete');
    }

}
