<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Calendar;

use App\Models\Calendar;
use App\Models\Service;
use App\Orchid\Layouts\Calendar\CalendarListLayout;
use App\Orchid\Layouts\Service\ServiceListLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CalendarListScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'calendars' => Calendar::paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Calendar';
    }


    public function description(): ?string
    {
        return 'All calendars';
    }


    /*public function permission(): ?iterable
    {
        return [
            'platform.systems.users',
        ];
    }*/

    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('plus')
                ->route('platform.systems.calendars.create'),
        ];
    }
    public function layout(): iterable
    {
        return [
            CalendarListLayout::class,
            Layout::modal('asyncEditCalendarModal', CalendarListLayout::class)
                ->async('asyncGetCalendar'),
        ];
    }
    public function asyncGetCalendar(Calendar $calendar): iterable
    {
        return [
            'calendar' => $calendar,
        ];
    }
    public function saveCalendar(Request $request, Calendar $calendar): void
    {
        $calendar->fill($request->input('calendar'))->save();

        Toast::info(__('Calendar was saved.'));
    }

    public function remove(Request $request): void
    {
        Calendar::findOrFail($request->get('id'))->delete();

        Toast::info(__('Calendar was removed'));
    }
}
