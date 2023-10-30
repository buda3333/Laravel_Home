<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Specialist;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class SpecialistEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('specialist.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('specialist.description')
                ->type('text')
                ->required()
                ->title(__('Description'))
                ->placeholder(__('Description')),

        ];
    }
}
