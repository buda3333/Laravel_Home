<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Service;

use App\Models\Service;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
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
                ->render(function (Service $service) {
                    return Link::make($service->name)->route('platform.systems.services.edit', ['service' => $service->id]);
                }),


            TD::make('description', __('Description'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Service $service) {
                    return Link::make($service->description)->route('platform.systems.services.edit', ['service' => $service->id]);
                }),

            TD::make('price', __('Price'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Service $service) => ModalToggle::make((string) $service->price)
                    ->modalTitle((string) $service->price)
                    ->method('saveService')
                    ->asyncParameters([
                        'service' => $service->id,
                    ])),

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(fn (Service $service) => $service->updated_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Service $service) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.systems.services.edit', $service->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $service->id,
                            ]),
                    ])),
        ];
    }
}
