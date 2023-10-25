<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Service;

use App\Models\Service;
use App\Orchid\Layouts\Service\ServiceListLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ServiceListScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'services' => Service::paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Service';
    }


    public function description(): ?string
    {
        return 'All services';
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
                ->route('platform.systems.services.create'),
        ];
    }
    public function layout(): iterable
    {
        return [
            ServiceListLayout::class,
            Layout::modal('asyncEditServiceModal', ServiceListLayout::class)
                ->async('asyncGetService'),
        ];
    }
    public function asyncGetService(Service $service): iterable
    {
        return [
            'service' => $service,
        ];
    }
    public function saveService(Request $request, Service $service): void
    {
        $request->validate([
            'service.name' => [
                'required',
                Rule::unique(Service::class, 'name')->ignore($service),
            ],
        ]);

        $service->fill($request->input('service'))->save();

        Toast::info(__('Service was saved.'));
    }

    public function remove(Request $request): void
    {
        Service::findOrFail($request->get('id'))->delete();

        Toast::info(__('Service was removed'));
    }
}
