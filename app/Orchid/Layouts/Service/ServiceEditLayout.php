<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Service;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class ServiceEditLayout extends Rows
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
                ->placeholder(__('Name')),

            Input::make('service.description')
                ->type('text')
                ->required()
                ->title(__('Description'))
                ->placeholder(__('Description')),

            Input::make('service.price')
                ->type('integer')
                ->required()
                ->title(__('Price'))
                ->placeholder(__('Price')),

            Select::make('service.is_active')
                ->required()
                ->title(__('Active'))
                ->placeholder(__('Select status'))
                ->options([
                    true => __('Active'),
                    false => __('Inactive')
                ]),
        ];
    }
}
