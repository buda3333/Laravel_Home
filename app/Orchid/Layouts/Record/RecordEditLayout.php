<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Record;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class RecordEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('record.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('record.phone')
                ->type('integer')
                ->max(12)
                ->required()
                ->title(__('Phone'))
                ->placeholder(__('Phone')),

            Input::make('record.specialist_id')
                ->type('integer')
                ->max(12)
                ->required()
                ->title(__('specialist_id'))
                ->placeholder(__('specialist_id')),

            Input::make('record.service_id')
                ->type('integer')
                ->max(12)
                ->required()
                ->title(__('service_id'))
                ->placeholder(__('service_id')),

            Input::make('record.date')
                ->type('date')
                ->required()
                ->title(__('date'))
                ->placeholder(__('date')),

            Input::make('record.time')
                ->type('time')
                ->required()
                ->title(__('time'))
                ->placeholder(__('time')),

        ];
    }
}
