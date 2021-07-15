<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Dbook as ModelsDbook;
use Illuminate\Validation\Validator;
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
        // $datas = DB::table('books')->join('dbooks','jbook_id','=','books.id')->get();
        $datas = Book::paginate(5);
        // dd($datas);
        return view('index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dbooks = ModelsDbook::all();
        return view('create', compact('dbooks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_buku'    => 'required|min:5',
            'penerbit'     => 'required|:min:3',
            'jbook_id'     => 'required',
            'thn_terbit'   => 'required|date',
            'path'         => 'required|mimes:png,jpg,jpeg,pdf,xlx,docx|max:2048',
        ]);

        $data = $request->all();
  
        if ($path = $request->file('path')) {
            $destinationPath = 'file/';
            $profilePath = date('YmdHis') . "." . $path->getClientOriginalExtension();
            $path->move($destinationPath, $profilePath);
            $input['path'] = "$profilePath";
        }

        // dd($data);
        $book   = Book::create($data);
        if($book){
            return redirect()->route('index')->with('success','Item created successfully!');
        }else{
            return redirect()->route('index')->with('error','You have no permission for this page!');
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
        $request->validate([
            'nama_buku'     => 'required|min:5',
            'penerbit'     => 'required|:min:3',
            'jbook_id'     => 'required',
            'thn_terbit'   => 'required|date',
            'path'         => 'required|mimes:png,jpg,jpeg,pdf,xlx:|max:2048',
        ]); 
        $book = Book::findOrFail($id);
        $data = $request->all();
  
        if ($file = $request->file('path')) {
            $destinationPath = 'path/';
            $profileFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileFile);
            $data['path'] = "$profileFile";
        } else {
            unset($data['path']);
        } 

        // $book = Book::findOrFail($id);
        $data = $request->all(); 
        $book->update($data); 
        if($book){
            return redirect()->route('index')->with('info','Success update items');
        }else{
            return redirect()->route('index')->with('error','Update Failed!');
        }

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
