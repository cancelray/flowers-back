<?php

namespace App\Orchid\Layouts\OrderProducts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

use Orchid\Screen\Actions\ModalToggle;

class OrderProductsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orderProducts';
    
    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('order_id', 'Заказ №')->sort()->filter(TD::FILTER_TEXT),
            TD::make('product_id', 'Товар')
                ->render(function (OrderProduct $orderProduct)
                {
                    $products = Product::all();
                    foreach($products as $product) {
                        if ($product->id == $orderProduct->product_id) {
                            return $product->name;
                        }
                    }
                })
                ->filter(TD::FILTER_NUMERIC),
            TD::make('count', 'Кол - во'),
            TD::make('action', 'Редактировать')
                ->render(function (OrderProduct $orderProduct)
                    {
                        return ModalToggle::make('Редактировать')
                            ->modal('editOrderProduct')
                            ->method('updateOrderProduct')
                            ->modalTitle('Редактирование '.' товар из заказ № '.$orderProduct->id)
                            ->asyncParameters([
                                'orderProduct' => $orderProduct->id, 
                            ]);
                    }),
            TD::make('action', 'Удалить')
                ->render(function (OrderProduct $orderProduct)
                    {
                        return ModalToggle::make('Удалить')
                            ->modal('deleteOrderProduct')
                            ->method('removeOrderProduct')
                            ->modalTitle('Подтвердите удаление '.' товар из заказа № '.$orderProduct->id)
                            ->asyncParameters([
                                'orderProduct' => $orderProduct->id, 
                            ]);
                    }),
        ];
    }
}
