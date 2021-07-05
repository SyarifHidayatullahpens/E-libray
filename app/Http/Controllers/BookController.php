<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Book::latest()->paginate(3);
        return view('index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama_buku'     => 'required|min:5',
            'penerbit'     => 'required',
            'jenis_buku'   => 'required',
            'thn_terbit'   => 'required'
        ]);
        $validatedData = $request->validate([
            'nama_buku'     => ['required'],
            'penerbit'     => ['required'],
            'jenis_buku'   => ['required'],
            'thn_terbit'   => ['required']
        ]);
        $data   = $request->all();
        // dd($data);
        $book   = Book::create($data);

        if($data){
            return redirect()->route('index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Book::findOrFail($id);
        return view('show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Book::findOrFail($id);
        return view('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $book = Book::findOrFail($id);
        $data = $request->all(); 
        $book->update($data); 
        return redirect('/index')
        ->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/index')
        ->with('success','Book deleted successfully');
    }
}
