<?php

declare(strict_types=1);

namespace App\Orchid\Screens\SpecialistService;

use App\Models\SpecialistService;
use App\Orchid\Layouts\Specialist\SpecialistListLayout;
use App\Orchid\Layouts\SpecialistService\SpecialistServiceListLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class SpecialistServiceListScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'specialistServices' => SpecialistService::paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'SpecialistService';
    }


    public function description(): ?string
    {
        return 'All specialistServices';
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
                ->route('platform.systems.specialistServices.create'),
        ];
    }
    public function layout(): iterable
    {
        return [
            SpecialistServiceListLayout::class,
            Layout::modal('asyncEditSpecialistServiceModal', SpecialistServiceListLayout::class)
                ->async('asyncGetSpecialistService'),
        ];
    }
    public function asyncGetSpecialistService(SpecialistService $specialistService): iterable
    {
        return [
            'specialistService' => $specialistService,
        ];
    }
    public function saveSpecialistService(Request $request, SpecialistService $specialistService): void
    {
        $specialistService->fill($request->input('specialistService'))->save();

        Toast::info(__('SpecialistService was saved.'));
    }

    public function remove(Request $request): void
    {
        SpecialistService::findOrFail($request->get('id'))->delete();

        Toast::info(__('SpecialistService was removed'));
    }
}
