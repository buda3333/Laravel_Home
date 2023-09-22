<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Service;



use App\Models\Service;
use App\Orchid\Layouts\Service\ServiceListLayout;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use Orchid\Screen\Screen;

class ServiceListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'services' => Service::filters()->defaultSort('id', 'desc')->paginate(),
        ];
    }
    public function name(): ?string
    {
        return 'Manage service';
    }
    public function description(): ?string
    {
        return 'Access rights';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.systems.services',
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('plus')
                ->href(route('platform.systems.services.create')),
        ];
    }
    public function layout(): iterable
    {
        return [
            ServiceListLayout::class,
        ];
    }
}
