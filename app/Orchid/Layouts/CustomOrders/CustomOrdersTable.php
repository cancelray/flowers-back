<?php

namespace App\Orchid\Layouts\CustomOrders;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use App\Models\Custom;

use Orchid\Screen\Actions\ModalToggle;

class CustomOrdersTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'custom';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', '№ Custom-')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('name', 'Имя заказчика')->sort()->filter(TD::FILTER_TEXT),
            TD::make('phone', 'Телефон заказчика')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('email', 'Email заказчика')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('recipient_phone', 'Телефон получателя')->filter(TD::FILTER_NUMERIC),
            TD::make('recipient_name', 'Имя получателя')->sort()->filter(TD::FILTER_TEXT),
            TD::make('description', 'Состав заказа')->filter(TD::FILTER_TEXT),
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
            ->render(function ($custom)
                {
                    return $custom->is_paid ? 'Оплачен' : 'Не оплачен';
                })
            ->sort()
            ->filter(TD::FILTER_TEXT),
            TD::make('is_complite', 'Завершен')
            ->render(function ($custom)
                {
                    return $custom->is_complite ? 'Завершен' : 'Не завершен';
                })
            ->sort()
            ->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Создан')->sort()->filter(TD::FILTER_DATE),
            TD::make('updated_at', 'Изменен')->sort()->filter(TD::FILTER_DATE),
            TD::make('action', 'Редактировать')
            ->render(function (Custom $custom)
                {
                    return ModalToggle::make('Редактировать')
                        ->modal('editCustom')
                        ->method('updateCustom')
                        ->modalTitle('Редактирование '.'заказа Custom-'.$custom->id)
                        ->asyncParameters([
                            'custom' => $custom->id, 
                        ]);
                }),
            TD::make('action', 'Удалить')
                ->render(function (Custom $custom)
                    {
                        return ModalToggle::make('Удалить')
                            ->modal('deleteCustom')
                            ->method('removeCustom')
                            ->modalTitle('Подтвердите удаление '.'заказа Custom-'.$custom->id)
                            ->asyncParameters([
                                'custom' => $custom->id, 
                            ]);
                    }),
        ];
    }
}
