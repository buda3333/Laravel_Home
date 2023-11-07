<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Models\Record;
use App\Models\Service;
use App\Models\SpecialistService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nutnet\LaravelSms\SmsSender;
/**
 *@deprecated
 */
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
        $request->session()->put(['name' => $request->name]);
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
        $service = Service::find($service_id);
        $specialists = $service->specialists;
        return response(view('record.index4', ['specialists' => $specialists]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|Factory|View
     */
    public function store2(Request $request)
    {
        $specialist_id = $request->specialist_id;
        $request->session()->put('specialist_id', $specialist_id);
        $service_id = session('service_id');
        $specialistService= SpecialistService::where('service_id', $service_id)
            ->where('specialist_id', $specialist_id)
            ->with('calendars')->first();
        $records = Record::where('specialist_id', $specialist_id)->get();
        $calendars = $specialistService->calendars->reject(function ($calendar) use ($records) {
            foreach ($records as $record) {
                if ($calendar->date == $record->date && $calendar->time == $record->time) {
                    return true;
                }
            }
            return false;
        });
        return response(view('record.index5', ['calendars' => $calendars]));
    }
    public function code(Request $request,SmsSender $smsSender){
        $phoneNumber = $request->phone;
        $text=rand(1000,9999);
        $smsSender->send($phoneNumber, $text);
        $request->session()->put(['date' => $request->date,'time' => $request->time, 'phone' => $phoneNumber,'code' => $text,]);
        print_r($text);
        return response(view('record.indexCode'));
    }
    public function create(Request $request,SmsSender $smsSender){
        $codeRequest = $request->code;
        $code = session('code');
        if ($code == $codeRequest) {
            $record = new Record();
            $name = session('name');
            $phone = session('phone');
            $specialist_id = session('specialist_id');
            $service_id = session('service_id');
            $date = session('date');
            $time = session('time');
            $record->name = $name;
            $record->specialist_id = $specialist_id;
            $record->service_id = $service_id;
            $record->date = $date;
            $record->time = $time;
            $record->phone = $phone;
            if (Auth::check()) {
                $record->user_id = Auth::user()->id;
            }
            $record->save();
            return redirect('/home');
        } else {
            $error = "Неверный код";
            return response(view('record.indexCode', ['error' => $error]));
        }
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
