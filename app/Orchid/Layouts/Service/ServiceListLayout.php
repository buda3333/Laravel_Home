<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Service;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class ServiceListLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('service.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name'))
                ->help(__('Service display name')),

            Input::make('service.price')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Price'))
                ->placeholder(__('Price'))
                ->help(__('Actual Price in the system')),
        ];
    }
}
