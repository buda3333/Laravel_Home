<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Calendar;

use App\Models\Calendar;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CalendarListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'calendars';

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
                ->render(function (Calendar $calendar) {
                    return $calendar->id;
                }),

            TD::make('specialist_service_id', __('specialist_service_id'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->specialist_service_id;
                }),

            TD::make('date', 'Date')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->date;
                }),
            TD::make('time', 'Time')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->time;
                }),


            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(fn (Calendar $calendar) => $calendar->updated_at->toDateTimeString()),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Calendar $calendar) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.systems.calendars.edit', $calendar->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $calendar->id,
                            ]),
                    ])),
        ];
    }
}
