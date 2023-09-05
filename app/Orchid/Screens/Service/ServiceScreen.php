<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Service;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use App\Orchid\Layouts\Service\ServiceListLayout;
use App\Orchid\Layouts\Role\RolePermissionLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;


class ServiceScreen extends Screen
{
    /**
     * Свойства имя и описание отвечают за то,
     * какое название будет отображаться
     * на экране пользователя и заголовках.
     */
    public $name = 'Manage Service';

    public $description = 'Access rights';

    /**
     * Метод определяющие все входные данные экрана,
     * именно в нём должны вызываться запросы к базе данных,
     * api или любые другие (не обязательно явно),
     * результатом которого должен быть массив,
     * обращение к которым будут использоваться его ключи.
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Определяет управляющие кнопки и события
     * которые должны будут произойти по нажатию
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
        ];
    }

    /**
     * Набор отображений,
     * строк, таблицы, графиков,
     * модальных окон и их комбинация
     */
    public function layout(): array
    {
        return [
            Layout::block([
                ServiceListLayout::class,
            ])
                ->title('Service')
                ->description('A role is a collection of privileges (of possibly different services like the Users service, Moderator, and so on) that grants users with that role the ability to perform certain tasks or operations.'),
        ];
    }

}
