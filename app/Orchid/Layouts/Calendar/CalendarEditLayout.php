<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Calendar;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class CalendarEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('calendar.specialist_service_id')
                ->type('integer')
                ->max(12)
                ->required()
                ->title(__('specialist_service_id'))
                ->placeholder(__('specialist_service_id')),

            Input::make('calendar.date')
                ->type('date')
                ->required()
                ->title(__('date'))
                ->placeholder(__('date')),

            Input::make('calendar.time')
                ->type('time')
                ->required()
                ->title(__('time'))
                ->placeholder(__('time')),
        ];
    }
}
