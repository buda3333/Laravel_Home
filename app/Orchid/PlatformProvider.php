<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access rights')),

            Menu::make(__('Calendar'))
                ->icon('bag')
                ->route('platform.systems.calendars')
                ->permission('platform.systems.calendars'),

            Menu::make(__('Service'))
                ->icon('bag')
                ->route('platform.systems.services')
                ->permission('platform.systems.services'),

            Menu::make(__('Specialist'))
                ->icon('bag')
                ->route('platform.systems.specialists')
                ->permission('platform.systems.specialists'),

            Menu::make(__('SpecialistService'))
                ->icon('bag')
                ->route('platform.systems.specialistServices')
                ->permission('platform.systems.specialistServices'),

            Menu::make(__('Records'))
                ->icon('bag')
                ->route('platform.systems.records')
                ->permission('platform.systems.records'),

            Menu::make(__('Roles'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make(__('Profile'))
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users'))
                ->addPermission('platform.systems.records', __('Records'))
                ->addPermission('platform.systems.services', __('Services'))
                ->addPermission('platform.systems.specialists', __('Specialists'))
                ->addPermission('platform.systems.calendars', __('Calendars'))
                ->addPermission('platform.systems.specialistServices', __('SpecialistServices')),
        ];
    }
}
