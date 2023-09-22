<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Service;

use App\Models\Service;
use App\Orchid\Layouts\Service\ServiceEditLayout;
use App\Orchid\Layouts\Service\ServicePermissionLayout;
use Illuminate\Notifications\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ServiceEditScreen extends Screen
{
    public $service;
    public function query(Service $service): iterable
    {
        return [
            'service'       => $service,
            'permission' => $service->getStatusPermission(),
        ];
    }
    public function name(): ?string
    {
        return 'Manage services';
    }
    public function description(): ?string
    {
        return 'All create services';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.systems.services',
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),

            Button::make(__('Remove'))
                ->icon('trash')
                ->method('remove')
                ->canSee($this->service->exists),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block([
                ServiceEditLayout::class,
            ])
                ->title('Service')
                ->description('HELP1'),

            Layout::block([
                ServicePermissionLayout::class,
            ])
                ->title('HELP2')
                ->description('HELP3'),
        ];
    }

    /**
     * @param Request $request
     * @param Role    $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, Service $service)
    {
        $request->validate([
            'service.slug' => [
                'required',
                Service::unique(Service::class, 'slug')->ignore($service),
            ],
        ]);

        $service->fill($request->get('service'));

        $service->permissions = collect($request->get('permissions'))
            ->map(fn ($value, $key) => [base64_decode($key) => $value])
            ->collapse()
            ->toArray();

        $service->save();

        Toast::info(__('Service was saved'));

        return redirect()->route('platform.systems.services');
    }

    public function remove(Service $service)
    {
        $service->delete();

        Toast::info(__('Service was removed'));

        return redirect()->route('platform.systems.services');
    }
}
