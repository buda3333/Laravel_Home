<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\SpecialistService;

use App\Models\SpecialistService;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SpecialistServiceListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'specialistServices';

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
                ->render(function (SpecialistService $specialistService) {
                    return $specialistService->id;
                }),
            TD::make('specialist_id', 'Specialist_id')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->specialist_id;
                }),
            TD::make('service_id', 'Service_id')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->service_id;
                }),

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(fn (SpecialistService $specialistService) => $specialistService->updated_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (SpecialistService $specialistService) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.systems.specialistServices.edit', $specialistService->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $specialistService->id,
                            ]),
                    ])),
        ];
    }
}
