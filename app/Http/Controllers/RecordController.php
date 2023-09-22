<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Models\Record;
use App\Models\Service;
use App\Models\Specialist;
use App\Models\Specialist_service;
use App\Models\SpecialistService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active',true)->get();
        //$specialists = Specialist::all()->random(2);
        $specialists = Specialist::whereNotIn('id', function($query) {
            $query->select('specialist_id')->from('records')->where('status', 'adopted');
        })->get();
        $specialistServices = SpecialistService::get();
        return view('record.index', ['services' => $services,'specialists' => $specialists,'specialistServices'=>$specialistServices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function create(RecordRequest $request)
    {
        $record = new Record();
        if (Auth::check()) {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $record->fill($data);
        } else {
            $record->fill($request->all());
        }
        $record->save();
        return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user_id)
    {
        $records = Record::where('user_id', $user_id)->where('status', 'adopted')->get();
        return response(view('record.record', ['records' => $records]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
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
