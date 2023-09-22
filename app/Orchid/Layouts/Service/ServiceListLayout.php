<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Service;

use App\Models\Service;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ServiceListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'services';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name', __('Name'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Service $service) => Link::make($service->name)
                    ->route('platform.systems.services.edit', $service->id)),

            TD::make('description', __('description'))
                ->sort()
                ->cantHide()
                ->filter(Input::make()),

            TD::make('created_at', __('Created'))
                ->sort()
                ->render(fn (Service $service) => $service->created_at->toDateTimeString()),
        ];
    }
}
