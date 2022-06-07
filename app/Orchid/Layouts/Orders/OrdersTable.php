<?php

namespace App\Orchid\Layouts\Orders;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

use Orchid\Screen\Actions\ModalToggle;

class OrdersTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', '№')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('name', 'Имя заказчика')->sort()->filter(TD::FILTER_TEXT),
            TD::make('phone', 'Телефон заказчика')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('email', 'Email заказчика')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('recipient_phone', 'Телефон получателя')->filter(TD::FILTER_NUMERIC),
            TD::make('recipient_name', 'Имя получателя')->sort()->filter(TD::FILTER_TEXT),
            TD::make('comment', 'Комментарий')->filter(TD::FILTER_TEXT),
            TD::make('', 'Состав заказа')
            ->render(function ($order)
                {
                    $orderProducts = OrderProduct::all();
                    $orderString = '';

                    foreach ($orderProducts as $orderProduct) {
                        if ($orderProduct->order_id === $order->id) {
                            $orderProductId = $orderProduct->product_id;
                            $product = Product::find($orderProductId);

                            $orderString .= $product->name . ' - ' . $orderProduct->count . '; ';

                            // $orderString .= $orderProduct->product_id . ' ';
                        }
                    }

                    return $orderString;
                }),
            TD::make('delivery_type', 'Доставка')->sort()->filter(TD::FILTER_TEXT),
            TD::make('delivery_city', 'Город')->sort()->filter(TD::FILTER_TEXT),
            TD::make('delivery_street', 'Улица')->filter(TD::FILTER_TEXT),
            TD::make('delivery_bldng', 'Корп/стр')->filter(TD::FILTER_TEXT),
            TD::make('delivery_house', 'Дом')->filter(TD::FILTER_TEXT),
            TD::make('delivery_room', 'Кв/офис')->filter(TD::FILTER_TEXT),
            TD::make('delivery_time', 'Время доставки')->filter(TD::FILTER_TEXT),
            TD::make('payment_type', 'Тип оплаты')->sort()->filter(TD::FILTER_TEXT),
            TD::make('full_price', 'Цена')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('is_paid', 'Оплата')
            ->render(function ($order)
                {
                    return $order->is_paid ? 'Оплачен' : 'Не оплачен';
                })
            ->sort()
            ->filter(TD::FILTER_TEXT),
            TD::make('is_complite', 'Завершен')
            ->render(function ($order)
                {
                    return $order->is_complite ? 'Завершен' : 'Не завершен';
                })
            ->sort()
            ->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Создан')->sort()->filter(TD::FILTER_DATE),
            TD::make('updated_at', 'Изменен')->sort()->filter(TD::FILTER_DATE),
            TD::make('action', 'Редактировать')
            ->render(function (Order $order)
                {
                    return ModalToggle::make('Редактировать')
                        ->modal('editOrder')
                        ->method('updateOrder')
                        ->modalTitle('Редактирование '.'заказа №'.$order->id)
                        ->asyncParameters([
                            'order' => $order->id, 
                        ]);
                }),
            TD::make('action', 'Удалить')
                ->render(function (Order $order)
                    {
                        return ModalToggle::make('Удалить')
                            ->modal('deleteOrder')
                            ->method('removeOrder')
                            ->modalTitle('Подтвердите удаление '.'заказа № '.$order->id)
                            ->asyncParameters([
                                'order' => $order->id, 
                            ]);
                    }),
        ];
    }
}

