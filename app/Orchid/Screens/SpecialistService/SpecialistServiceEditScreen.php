<?php

declare(strict_types=1);

namespace App\Orchid\Screens\SpecialistService;

use App\Models\SpecialistService;
use App\Orchid\Layouts\SpecialistService\SpecialistServiceEditLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class SpecialistServiceEditScreen extends Screen
{

    public $specialistService;


    public function query(SpecialistService $specialistService): iterable
    {
        return [
            'specialistService' => $specialistService,
        ];
    }

    public function name(): ?string
    {
        return $this->specialistService->exists ? 'Edit specialistService' : 'Create specialistService';
    }
    public function description(): ?string
    {
        return 'Details such';
    }

    /*public function permission(): ?iterable
    {
        return [
            'platform.systems.services',
        ];
    }*/
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Remove'))
                ->icon('trash')
                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                ->method('remove')
                ->canSee($this->specialistService->exists),

            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [

            Layout::block(SpecialistServiceEditLayout::class)
                ->title(__('Information'))
                ->description(__('Update your SpecialistService.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->specialistService->exists)
                        ->method('save')
                ),
        ];
    }
    public function save(SpecialistService $specialistService, Request $request)
    {
        $specialistService->fill($request->input('specialistService'))->save();
        Toast::info(__('SpecialistService was saved.'));
        return redirect()->route('platform.systems.specialistServices');
    }

    public function remove(SpecialistService $specialistService)
    {
        $specialistService->delete();

        Toast::info(__('SpecialistService was removed'));

        return redirect()->route('platform.systems.specialistServices');
    }

}
