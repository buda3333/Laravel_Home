<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Calendar;

use App\Models\Calendar;
use App\Orchid\Layouts\Calendar\CalendarEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CalendarEditScreen extends Screen
{

    public $calendar;


    public function query(Calendar $calendar): iterable
    {
        return [
            'calendar' => $calendar,
        ];
    }

    public function name(): ?string
    {
        return $this->calendar->exists ? 'Edit Calendar' : 'Create Calendar';
    }
    public function description(): ?string
    {
        return 'Details such';
    }

    /*public function permission(): ?iterable
    {
        return [
            'platform.systems.services',
        ];
    }*/
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Remove'))
                ->icon('trash')
                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                ->method('remove')
                ->canSee($this->calendar->exists),

            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [

            Layout::block(CalendarEditLayout::class)
                ->title(__('Information'))
                ->description(__('Update your Calendar.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->calendar->exists)
                        ->method('save')
                ),
        ];
    }
    public function save(Calendar $calendar, Request $request)
    {
        $calendar->fill($request->input('calendar'))->save();
        Toast::info(__('Calendar was saved.'));
        return redirect()->route('platform.systems.calendars');
    }

    public function remove(Calendar $calendar)
    {
        $calendar->delete();

        Toast::info(__('Calendar was removed'));

        return redirect()->route('platform.systems.calendars');
    }

}
