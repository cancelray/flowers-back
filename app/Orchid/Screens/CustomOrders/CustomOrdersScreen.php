<?php

namespace App\Orchid\Screens\CustomOrders;

use Illuminate\Http\Request;

use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;

use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\CustomOrders\CustomOrdersTable;

use App\Models\Custom;

class CustomOrdersScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'custom' => Custom::filters()->paginate(10),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Кастомные заказы';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать особый заказ')->modal('createCustom')->method('createCustomFunc'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            CustomOrdersTable::class,

            Layout::modal('createCustom', Layout::rows([
                Group::make([
                    Input::make('name')->required()->title('Имя заказчика'),
                    Input::make('phone')->required()->title('Телефон заказчика'),
                ]),
                Input::make('email')->required()->title('Email заказчика'),
                Group::make([
                    Input::make('recipient_phone')->title('Телефон получателя'),
                    Input::make('recipient_name')->title('Имя получателя'),
                ]),
                Input::make('description')->required()->title('Состав заказа'),
                Select::make('delivery_type')
                ->required()
                ->options([
                    'Курьером'   => 'Курьером',
                    'Самовывоз' => 'Самовывоз',
                ])
                ->title('Доставка'),
                Input::make('delivery_city')->title('Город'),
                Input::make('delivery_street')->title('Улица'),
                Group::make([
                    Input::make('delivery_bldng')->title('Корп/стр'),
                    Input::make('delivery_house')->title('Дом'),
                    Input::make('delivery_room')->title('Кв/офис'),
                ]),
                Input::make('delivery_time')->title('Время доставки'),
                Group::make([
                    Select::make('payment_type')
                    ->required()
                    ->options([
                        'Банковская карта'   => 'Банковская карта',
                        'Наличными' => 'Наличными',
                        'Apple pay' => 'Apple pay',
                        'Google pay' => 'Google pay',
                        'Криптовалюта' => 'Криптовалюта',
                    ])
                    ->title('Тип оплаты'),
                    Input::make('full_price')->required()->title('Цена'),
                ]),
                Group::make([
                    Select::make('is_paid')
                    ->options([
                        '0'   => 'Нет',
                    ])
                    ->title('Оплачен'),
                    Select::make('is_complite')
                    ->options([
                        '0'   => 'Нет',
                    ])
                    ->title('Завершен'),
                ]),
                Group::make([
                    DateTimer::make('created_at')->required()->title('Создан'),
                    DateTimer::make('updated_at')->disabled()->title('Изменен'),
                ]),
            ]))
            ->title('Создать заказ')
            ->applyButton('Создать'),

            Layout::modal('editCustom', Layout::rows([
                Input::make('custom.id')->type('hidden'),
                Group::make([
                    Input::make('custom.name')->required()->title('Имя заказчика'),
                    Input::make('custom.phone')->required()->title('Телефон заказчика'),
                ]),
                Input::make('custom.email')->required()->title('Email заказчика'),
                Group::make([
                    Input::make('custom.recipient_phone')->title('Телефон получателя'),
                    Input::make('custom.recipient_name')->title('Имя получателя'),
                ]),
                Input::make('custom.description')->required()->title('Состав заказа'),
                Select::make('custom.delivery_type')
                ->required()
                ->options([
                    'Курьером'   => 'Курьером',
                    'Самовывоз' => 'Самовывоз',
                ])
                ->title('Доставка'),
                Input::make('custom.delivery_city')->title('Город'),
                Input::make('custom.delivery_street')->title('Улица'),
                Group::make([
                    Input::make('custom.delivery_bldng')->title('Корп/стр'),
                    Input::make('custom.delivery_house')->title('Дом'),
                    Input::make('custom.delivery_room')->title('Кв/офис'),
                ]),
                Input::make('custom.delivery_time')->title('Время доставки'),
                Group::make([
                    Select::make('custom.payment_type')
                    ->required()
                    ->options([
                        'Банковская карта'   => 'Банковская карта',
                        'Наличными' => 'Наличными',
                        'Apple pay' => 'Apple pay',
                        'Google pay' => 'Google pay',
                        'Криптовалюта' => 'Криптовалюта',
                    ])
                    ->title('Тип оплаты'),
                    Input::make('custom.full_price')->required()->title('Цена'),
                ]),
                Group::make([
                    Select::make('custom.is_paid')
                    ->options([
                        '0'   => 'Нет',
                        '1'   => 'Да',
                    ])
                    ->title('Оплачен'),
                    Select::make('custom.is_complite')
                    ->options([
                        '0'   => 'Нет',
                        '1'   => 'Да',
                    ])
                    ->title('Завершен'),
                ]),
                Group::make([
                    DateTimer::make('custom.created_at')->disabled()->title('Дата создания'),
                    DateTimer::make('custom.updated_at')->required()->title('Дата изменения'),
                ]),
            ]))
            ->async('asyncGetCustom')
            ->title('Изменить заказ')
            ->applyButton('Изменить'),

            Layout::modal('deleteCustom', Layout::rows([
                Input::make('custom.id')->type('hidden'),
            ]))
            ->async('asyncGetCustom')
            ->applyButton('Удалить'),
        ];
    }

    public function createCustomFunc(Request $request) 
    {
        Custom::create($request->all());
        Toast::info('Заказ создан');
    }

    public function asyncGetCustom(Custom $custom)
    {
        return [
            'custom' => $custom,
        ];
    }

    public function updateCustom(Request $request)
    {
        Custom::find($request->input('custom.id'))->update($request->custom);
        Toast::info('Заказ обновлён');
    }

    public function removeCustom(Request $request)
    {
        Custom::find($request->input('custom.id'))->delete();
        Toast::info('Заказ удалён');
    }
}
