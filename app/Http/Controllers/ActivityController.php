<?php

namespace App\Http\Controllers;

// data dan request yang dipanggil
use App\Models\Activity;
use App\Models\Gallery;
use App\Http\Requests\ActivityRequest;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ActivityController extends Controller
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
            $items = Activity::where('title', 'like', '%'.$cari.'%')->orderBy('id', 'desc')->get();
        }else{

            $items = Activity::all()->sortBy("date");
        }

        return view('pages.activities.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['finish'] = false;
        $data['role_upload'] = Auth::user()->role;

        Activity::create($data);
        return redirect()->route('activities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Activity::findOrFail($id);

        if(Auth::user()->role !=  $item->role_upload){
            return abort(403, "Maaf! Anda tidak punya akses");
        }

        return view('pages.activities.edit')->with([
            'item' => $item
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
        $data['slug'] = Str::slug($request->title);
        $item = Activity::findOrFail($id);

        $item->update($data);

        return redirect()->route('activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Activity::findOrFail($id);

        if(Auth::user()->role !=  $item->role_upload){
            return abort(403, "Maaf! Anda tidak punya akses");
        }

        $item->delete();
        return redirect()->route('activities.index');
    }

    public function setFinish(Request $request, $id)
    {
        
        $request->validate([
            'finish' => 'required|boolean'
        ]);

        $item = Activity::findOrFail($id);
        
        if(Auth::user()->role !=  $item->role_upload){
            return abort(403, "Maaf! Anda tidak punya akses");
        }

        $item->finish = $request->finish;

        $item->save();

        return back()->withInput();
    }

    public function downloadPDF()
    {
        $items = Activity::all();
        $pdf = PDF::loadView('pages.PDF.PdfActivity', [
            'items' => $items
        ]);

        return $pdf->download('report-activities-table');
    }

    public function calendar()
    {

        $items = Activity::where('finish', false)->get();
        return view('pages.activities.calendar')->with([
            'items' => $items,
        ]);
    }

    public function gallery($id)
    {
        $activity = Activity::findOrFail($id);
        $items = Gallery::where('activities_id', $id)->with('activities')->get();

        return view('pages.activities.gallery')->with([
            'activity' => $activity,
            'items' => $items
        ]);
    }
}
