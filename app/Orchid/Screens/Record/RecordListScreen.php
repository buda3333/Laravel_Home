<?php

namespace App\Orchid\Screens\Record;

use App\Models\Record;
use App\Orchid\Layouts\Record\RecordListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
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
        return [];
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
        ];
    }
    public function remove(Request $request): void
    {
        Record::findOrFail($request->get('id'))->delete();

        Toast::info(__('User was removed'));
    }
}
