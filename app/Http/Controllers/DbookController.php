<?php

namespace App\Http\Controllers;
use App\Models\Dbook;
use Illuminate\Http\Request;

class DbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Dbook::all();
        return view('layouts2.index',compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts2.create-typebook');
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
            'jenis_buku'    => 'required|min:5'
        ]);
        $data   = $request->all();
        $dbook  = Dbook::create($data);
        if($dbook) {
            return redirect()->route('layouts2.index')->with('success','Item created successfully!');
        }else{
            return redirect()->route('layouts2.indexs')->with('error','You have no permission for this page!');
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
        $data = Dbook::findOrFail($id);
        return view('layouts2.show-typebook',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dbook::findOrFail($id);
        return view('layouts2.edit-typebook',compact('data'));
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
       $validated = $request->validate([
           'jenis_buku'     => 'required|:min:5'
       ]);
       $dbook = Dbook::findOrFail($id);
       $data = $request->all();
       $dbook->update($data);
       if($dbook){
        return redirect()->route('layouts2.index')->with('info','You added new items');
        }else{
            return redirect()->route('layouts2.index')->with('error','You have no permission for this page!');
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
        $dbook = DBook::findOrFail($id);
        $dbook->delete();
        return redirect('layouts2.index')
        ->with('success','Book  Type deleted successfully');
    }
}
