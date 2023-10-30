<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\SpecialistService;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class SpecialistServiceEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('specialistService.specialist_id')
                ->type('integer')
                ->max(12)
                ->required()
                ->title(__('specialist_id'))
                ->placeholder(__('specialist_id')),

            Input::make('specialistService.service_id')
                ->type('integer')
                ->max(12)
                ->required()
                ->title(__('service_id'))
                ->placeholder(__('service_id')),

        ];
    }
}
