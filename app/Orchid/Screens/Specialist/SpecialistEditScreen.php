<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Specialist;

use App\Models\Specialist;
use App\Orchid\Layouts\Specialist\SpecialistEditLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Access\Impersonation;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class SpecialistEditScreen extends Screen
{

    public $specialist;


    public function query(Specialist $specialist): iterable
    {
        return [
            'specialist' => $specialist,
        ];
    }

    public function name(): ?string
    {
        return $this->specialist->exists ? 'Edit specialist' : 'Create specialist';
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
                ->canSee($this->specialist->exists),

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

            Layout::block(SpecialistEditLayout::class)
                ->title(__('Information'))
                ->description(__('Update your Specialist.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->specialist->exists)
                        ->method('save')
                ),
        ];
    }
    public function save(Specialist $specialist, Request $request)
    {
        $request->validate([
            'specialist.name' => [
                'required',
                Rule::unique(Specialist::class, 'name')->ignore($specialist),
            ],
        ]);
        $specialist->fill($request->input('specialist'))->save();
        Toast::info(__('Specialist was saved.'));
        return redirect()->route('platform.systems.specialists');
    }

    public function remove(Specialist $specialist)
    {
        $specialist->delete();

        Toast::info(__('Specialist was removed'));

        return redirect()->route('platform.systems.specialists');
    }

}
