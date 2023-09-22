<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Models\Record;
use App\Models\Service;
use App\Models\Specialist;
use App\Models\SpecialistService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RecordControllerNew extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('record.index2');
    }

    public function index2(RecordRequest $request)
    {
        $request->session()->put('name',$request->name);
        $services = Service::where('is_active', true)->get();
       return response(view('record.index3', ['services' => $services]));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|Factory|View
     */
    public function store(Request $request){
        $service_id = $request->service_id;
        $request->session()->put('service_id',$service_id);
        $data = SpecialistService::where('service_id', $service_id)->pluck('specialist_id');
        $specialists = Specialist::whereIn('id', $data)->get();
        return response(view('record.index4', ['specialists' => $specialists]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|Factory|View
     */
    public function store2(Request $request)
    {
        $request->session()->put('specialist_id',$request->specialist_id);
        return response(view('record.index5'));

    }
    public function create(Request $request)
    {
        $record = new Record();
        $name = session('name');
        $specialist_id = session('specialist_id');
        $service_id = session('service_id');
        $datetime = $request->datetime;
        $record->name = $name;
        $record->specialist_id = $specialist_id;
        $record->service_id = $service_id;
        $record->datetime = $datetime;
        if (Auth::check()) {
            $record->user_id = Auth::user()->id;
        }
        $record->save();

        return redirect('/home');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
