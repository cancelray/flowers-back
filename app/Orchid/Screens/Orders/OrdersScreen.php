<?php

namespace App\Orchid\Screens\Orders;

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

use App\Orchid\Layouts\Orders\OrdersTable;

use App\Models\Order;

class OrdersScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'orders' => Order::filters()->paginate(10),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Заказы';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать заказ')->modal('createOrder')->method('createOrderFunc'),
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
            OrdersTable::class,

            Layout::modal('createOrder', Layout::rows([
                Group::make([
                    Input::make('name')->required()->title('Имя заказчика'),
                    Input::make('phone')->required()->title('Телефон заказчика'),
                ]),
                Input::make('email')->required()->title('Email заказчика'),
                Group::make([
                    Input::make('recipient_phone')->title('Телефон получателя'),
                    Input::make('recipient_name')->title('Имя получателя'),
                ]),
                Input::make('comment')->title('Комментарий'),
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

            Layout::modal('editOrder', Layout::rows([
                Input::make('order.id')->type('hidden'),
                Group::make([
                    Input::make('order.name')->required()->title('Имя заказчика'),
                    Input::make('order.phone')->required()->title('Телефон заказчика'),
                ]),
                Input::make('order.email')->required()->title('Email заказчика'),
                Group::make([
                    Input::make('order.recipient_phone')->title('Телефон получателя'),
                    Input::make('order.recipient_name')->title('Имя получателя'),
                ]),
                Input::make('order.comment')->title('Комментарий'),
                Select::make('order.delivery_type')
                ->required()
                ->options([
                    'Курьером'   => 'Курьером',
                    'Самовывоз' => 'Самовывоз',
                ])
                ->title('Доставка'),
                Input::make('order.delivery_city')->title('Город'),
                Input::make('order.delivery_street')->title('Улица'),
                Group::make([
                    Input::make('order.delivery_bldng')->title('Корп/стр'),
                    Input::make('order.delivery_house')->title('Дом'),
                    Input::make('order.delivery_room')->title('Кв/офис'),
                ]),
                Input::make('order.delivery_time')->title('Время доставки'),
                Group::make([
                    Select::make('order.payment_type')
                    ->required()
                    ->options([
                        'Банковская карта'   => 'Банковская карта',
                        'Наличными' => 'Наличными',
                        'Apple pay' => 'Apple pay',
                        'Google pay' => 'Google pay',
                        'Криптовалюта' => 'Криптовалюта',
                    ])
                    ->title('Тип оплаты'),
                    Input::make('order.full_price')->required()->title('Цена'),
                ]),
                Group::make([
                    Select::make('order.is_paid')
                    ->options([
                        '0'   => 'Нет',
                        '1'   => 'Да',
                    ])
                    ->title('Оплачен'),
                    Select::make('order.is_complite')
                    ->options([
                        '0'   => 'Нет',
                        '1'   => 'Да',
                    ])
                    ->title('Завершен'),
                ]),
                Group::make([
                    DateTimer::make('order.created_at')->disabled()->title('Дата создания'),
                    DateTimer::make('order.updated_at')->required()->title('Дата изменения'),
                ]),
            ]))
            ->async('asyncGetOrder')
            ->title('Изменить заказ')
            ->applyButton('Изменить'),

            Layout::modal('deleteOrder', Layout::rows([
                Input::make('order.id')->type('hidden'),
            ]))
            ->async('asyncGetOrder')
            ->applyButton('Удалить'),
        ];
    }

    public function createOrderFunc(Request $request) 
    {
        Order::create($request->all());
        Toast::info('Заказ создан');
    }

    public function asyncGetOrder(Order $order)
    {
        return [
            'order' => $order,
        ];
    }

    public function updateOrder(Request $request)
    {
        Order::find($request->input('order.id'))->update($request->order);
        Toast::info('Заказ обновлён');
    }

    public function removeOrder(Request $request)
    {
        Order::find($request->input('order.id'))->delete();
        Toast::info('Заказ удалён');
    }
}
