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
            TD::make('id', __('ID'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Service $service) {
                    return $service->id;
                }),

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
                ->render(fn (Service $service) => ModalToggle::make((string)($service->price))
                    ->modal('asyncEditServiceModal')
                    ->modalTitle('price')
                    ->method('saveService')
                    ->asyncParameters([
                        'service' => $service->id,
                    ])),
            TD::make('is_active', __('Active'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Service $service) {
                    return $service->is_active ? __('Active') : __('Inactive');
                }),

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
