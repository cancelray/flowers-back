<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

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
            Menu::make(__('Товары'))
                ->icon('modules')
                ->route('platform.products')
                ->title(__('Товары')),

            Menu::make(__('Популярные товары'))
                ->icon('modules')
                ->route('platform.favorites'),

            Menu::make(__('Категории'))
                ->icon('modules')
                ->route('platform.categories'),

            Menu::make(__('Форматы'))
                ->icon('modules')
                ->route('platform.formats'),

            Menu::make(__('Цвета'))
                ->icon('modules')
                ->route('platform.colors'),

            Menu::make(__('Заказы'))
                ->icon('module')
                ->route('platform.orders')
                ->title(__('Заказы')),

            Menu::make(__('Составы заказов'))
                ->icon('module')
                ->route('platform.orderProducts'),

            Menu::make(__('Кастомные заказы'))
                ->icon('module')
                ->route('platform.custom'),

            Menu::make(__('Пользователи'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Права доступа')),

            Menu::make(__('Роли'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),

            // Menu::make('Basic Elements')
            //     ->title('Form controls')
            //     ->icon('note')
            //     ->route('platform.example.fields'),

            // Menu::make('Advanced Elements')
            //     ->icon('briefcase')
            //     ->route('platform.example.advanced'),

            // Menu::make('Text Editors')
            //     ->icon('list')
            //     ->route('platform.example.editors'),

            // Menu::make('Overview layouts')
            //     ->title('Layouts')
            //     ->icon('layers')
            //     ->route('platform.example.layouts'),

            // Menu::make('Chart tools')
            //     ->icon('bar-chart')
            //     ->route('platform.example.charts'),

            // Menu::make('Cards')
            //     ->icon('grid')
            //     ->route('platform.example.cards')
            //     ->divider(),

            // Menu::make('Documentation')
            //     ->title('Docs')
            //     ->icon('docs')
            //     ->url('https://orchid.software/en/docs'),

            // Menu::make('Changelog')
            //     ->icon('shuffle')
            //     ->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')
            //     ->target('_blank')
            //     ->badge(function () {
            //         return Dashboard::version();
            //     }, Color::DARK()),

            // Menu::make(__('Users'))
            //     ->icon('user')
            //     ->route('platform.systems.users')
            //     ->permission('platform.systems.users')
            //     ->title(__('Access rights')),

            // Menu::make(__('Roles'))
            //     ->icon('lock')
            //     ->route('platform.systems.roles')
            //     ->permission('platform.systems.roles'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
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
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
