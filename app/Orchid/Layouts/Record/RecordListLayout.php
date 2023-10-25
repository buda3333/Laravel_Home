<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Record;
use App\Models\Record;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class RecordListLayout extends Table
{
    /**
     * The data source.
     *
     * @var string
     */
    public $target = 'records';

    /**
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('name', 'Name')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->name;
                }),
            TD::make('phone', 'Phone')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->phone;
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
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Record $record) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.record.edit', $record->id)
                            ->icon('pencil'),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $record->id,
                            ]),
                    ])),
        ];
    }
}
