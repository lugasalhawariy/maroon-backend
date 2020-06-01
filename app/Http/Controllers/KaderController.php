<?php

namespace App\Http\Controllers;

// data yang dibutuhkan
use App\Http\Requests\KaderRequest;
use App\Models\Kader;
use App\User;

use Illuminate\Http\Request;

class KaderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->get('search');

        if($request->input('search')){
            $items = Kader::where('nama', 'like', '%'.$cari.'%')->orderBy('id', 'desc')->get();
        }else{

            $items = Kader::with('user')->orderBy('created_at', 'desc')->get();
        }

        return view('pages.kader.index')->with([
            'items' => $items, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = User::all();

        return view('pages.kader.create')->with([
            'item' => $item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaderRequest $request)
    {
        $data = $request->all();
        $user = $request->users_id;

        $item = User::findOrFail($user);

        // ubah Role menjadi kader
        if($item->role == 'USER'){
            $item->role = 'KADER';
            $item->save();
        }

        $data['nama'] = $item->name;

        Kader::create($data);

        return redirect()->route('kader.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kader::find($id);

        return view('pages.kader.edit')->with([
            'item' => $item,
        ]);
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
        $data = $request->all();
        $item = Kader::findOrFail($id);
        
        $item->update($data);
        return redirect()->route('kader.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kader::findOrFail($id);
        $item->delete();

        return back();
    }
}
