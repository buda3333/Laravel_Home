<?php

declare(strict_types=1);

use App\Orchid\Screens\Calendar\CalendarEditScreen;
use App\Orchid\Screens\Calendar\CalendarListScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Record\RecordEditScreen;
use App\Orchid\Screens\Record\RecordListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\Service\ServiceEditScreen;
use App\Orchid\Screens\Service\ServiceListScreen;
use App\Orchid\Screens\Specialist\SpecialistEditScreen;
use App\Orchid\Screens\Specialist\SpecialistListScreen;
use App\Orchid\Screens\SpecialistService\SpecialistServiceEditScreen;
use App\Orchid\Screens\SpecialistService\SpecialistServiceListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));



// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));




// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));




Route::screen('records', RecordListScreen::class)
    ->name('platform.systems.records');

Route::screen('records/create', RecordEditScreen::class)
    ->name('platform.systems.records.create');

Route::screen('records/{record}/edit', RecordEditScreen::class)
    ->name('platform.systems.records.edit');


Route::screen('services', ServiceListScreen::class)
    ->name('platform.systems.services');

Route::screen('services/create', ServiceEditScreen::class)
    ->name('platform.systems.services.create');

Route::screen('services/{service}/edit', ServiceEditScreen::class)
    ->name('platform.systems.services.edit');


Route::screen('specialists', SpecialistListScreen::class)
    ->name('platform.systems.specialists');

Route::screen('specialists/create', SpecialistEditScreen::class)
    ->name('platform.systems.specialists.create');

Route::screen('specialists/{specialist}/edit', SpecialistEditScreen::class)
    ->name('platform.systems.specialists.edit');


Route::screen('specialistServices', SpecialistServiceListScreen::class)
    ->name('platform.systems.specialistServices');

Route::screen('specialistServices/create', SpecialistServiceEditScreen::class)
    ->name('platform.systems.specialistServices.create');

Route::screen('specialistServices/{specialistService}/edit', SpecialistServiceEditScreen::class)
    ->name('platform.systems.specialistServices.edit');


Route::screen('calendars', CalendarListScreen::class)
    ->name('platform.systems.calendars');

Route::screen('calendars/create', CalendarEditScreen::class)
    ->name('platform.systems.calendars.create');

Route::screen('calendars/{calendar}/edit', CalendarEditScreen::class)
    ->name('platform.systems.calendars.edit');
