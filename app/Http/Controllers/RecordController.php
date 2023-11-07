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
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index()
    {
        return view('record.indexGO', [
            'services' => Service::where('is_active',true)->get(),
            'specialists' => Specialist::get(),
            'specialistServices' => SpecialistService::get(),
            'calendars' => Calendar::getFreeCalendars()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function create(RecordRequest $request)
    {
        $record = new Record();
        $data = $request->all();
        if (Auth::check()) {
            $data['user_id'] = Auth::user()->id;
        }
        $record->fill($data);
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
