<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Models\Calendar;
use App\Models\Record;
use App\Models\Service;
use App\Models\Specialist;
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
        $specialists = Specialist::get();
        $specialistServices = SpecialistService::get();
        $calendars = Calendar::
            leftJoin('specialist_services', 'calendars.specialist_service_id', '=', 'specialist_services.id')
            ->leftJoin('records', function($join)
            {
                $join->on('specialist_services.specialist_id', '=', 'records.specialist_id')
                    ->on('specialist_services.service_id', '=', 'records.service_id')
                    ->on('calendars.date', '=', 'records.date')
                    ->on('calendars.time', '=', 'records.time');
            })
            ->select('calendars.date', 'calendars.time','calendars.specialist_service_id')
            ->whereNull('records.id')
            ->get();
        return view('record.indexGO', ['services' => $services,'specialists' => $specialists,'specialistServices'=>$specialistServices,'calendars' => $calendars]);
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

}
