<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Specialist;

use App\Models\Specialist;
use App\Orchid\Layouts\Specialist\SpecialistListLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class SpecialistListScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'specialists' => Specialist::paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Specialist';
    }


    public function description(): ?string
    {
        return 'All specialists';
    }


    /*public function permission(): ?iterable
    {
        return [
            'platform.systems.users',
        ];
    }*/

    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('plus')
                ->route('platform.systems.specialists.create'),
        ];
    }
    public function layout(): iterable
    {
        return [
            SpecialistListLayout::class,
            Layout::modal('asyncEditSpecialistModal', SpecialistListLayout::class)
                ->async('asyncGetSpecialist'),
        ];
    }
    public function asyncGetSpecialist(Specialist $specialist): iterable
    {
        return [
            'specialist' => $specialist,
        ];
    }
    public function saveSpecialist(Request $request, Specialist $specialist): void
    {
        $request->validate([
            'specialist.name' => [
                'required',
                Rule::unique(Specialist::class, 'name')->ignore($specialist),
            ],
        ]);

        $specialist->fill($request->input('specialist'))->save();

        Toast::info(__('Specialist was saved.'));
    }

    public function remove(Request $request): void
    {
        Specialist::findOrFail($request->get('id'))->delete();

        Toast::info(__('Specialist was removed'));
    }
}
