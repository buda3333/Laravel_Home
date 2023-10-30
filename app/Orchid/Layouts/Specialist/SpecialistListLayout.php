<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Specialist;

use App\Models\Specialist;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SpecialistListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'specialists';

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
                ->render(function (Specialist $specialist) {
                    return $specialist->id;
                }),

            TD::make('name', __('Name'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Specialist $specialist) {
                    return Link::make($specialist->name)->route('platform.systems.specialists.edit', ['specialist' => $specialist->id]);
                }),

            TD::make('description', __('Description'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Specialist $specialist) {
                    return Link::make($specialist->name)->route('platform.systems.specialists.edit', ['specialist' => $specialist->id]);
                }),

            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(fn (Specialist $specialist) => $specialist->updated_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Specialist $specialist) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.systems.specialists.edit', $specialist->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $specialist->id,
                            ]),
                    ])),
        ];
    }
}
