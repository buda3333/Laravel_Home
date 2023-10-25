<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Service;

use App\Models\Service;
use App\Orchid\Layouts\Service\ServiceEditLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Access\Impersonation;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ServiceEditScreen extends Screen
{

    public $service;


    public function query(Service $service): iterable
    {
        return [
            'service' => $service,
        ];
    }

    public function name(): ?string
    {
        return $this->service->exists ? 'Edit Service' : 'Create Service';
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
                ->canSee($this->service->exists),

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

            Layout::block(ServiceEditLayout::class)
                ->title(__('Information'))
                ->description(__('Update your Service.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->service->exists)
                        ->method('save')
                ),
        ];
    }
    public function save(Service $service, Request $request)
    {
        $request->validate([
            'service.name' => [
                'required',
                Rule::unique(Service::class, 'name')->ignore($service),
            ],
        ]);
        $service->fill($request->input('service'))->save();
        Toast::info(__('Service was saved.'));
        return redirect()->route('platform.systems.services');
    }

    public function remove(Service $service)
    {
        $service->delete();

        Toast::info(__('Service was removed'));

        return redirect()->route('platform.systems.services');
    }

}
