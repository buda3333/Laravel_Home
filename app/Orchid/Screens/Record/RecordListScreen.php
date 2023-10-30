<?php

namespace App\Orchid\Screens\Record;

use App\Models\Record;
use App\Orchid\Layouts\Record\RecordListLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RecordListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query() : array
    {
        return [
            'records' => Record::paginate(),
        ];
    }

    /**
     * The name of the screen is displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return "Record Screen";
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar() : array
    {
        return [
            Link::make(__('Add'))
                ->icon('plus')
                ->route('platform.systems.records.create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout() : array
    {
        return [
            RecordListLayout::class,
            Layout::modal('asyncEditRecordModal', RecordListLayout::class)
                ->async('asyncGetRecord'),
        ];
    }
    public function asyncGetRecord(Record $record): iterable
    {
        return [
            'record' => $record,
        ];
    }
    public function saveRecord(Request $request, Record $record): void
    {
        $request->validate([
            'service.name' => [
                'required',
                Rule::unique(Record::class, 'name')->ignore($record),
            ],
        ]);

        $record->fill($request->input('record'))->save();

        Toast::info(__('Record was saved.'));
    }
    public function remove(Request $request): void
    {
        Record::findOrFail($request->get('id'))->delete();

        Toast::info(__('User was removed'));
    }
}
