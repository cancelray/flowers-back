<?php

namespace App\Orchid\Screens\OrderProducts;

use Illuminate\Http\Request;

use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;

use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\OrderProducts\OrderProductsTable;

use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Order;

class OrderProductsScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'orderProducts' => OrderProduct::filters()->paginate(20),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Составы заказов';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Новый продукт - заказ')->modal('createOrderProduct')->method('createOrderProductFunc'),
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
            OrderProductsTable::class,

            Layout::modal('createOrderProduct', Layout::rows([
                Select::make('order_id')
                    ->options(function ()
                    {
                        $notFinishOrders = [];
                        $orders = Order::all();

                        foreach ($orders as $id => $order) {
                            if ($order->is_complite === 0) {
                                $notFinishOrders[$order->id] = $order->id;
                            }
                        }

                        return $notFinishOrders;
                    })
                    ->required()
                    ->title('Заказ №'),
                Select::make('product_id')
                    ->options(function ()
                    {
                        $products = Product::all();
                        $productsArr = [];

                        foreach ($products as $id => $product) {
                            $productsArr[$id + 1] = $product->name;
                        }

                        return $productsArr;
                    })
                    ->required()
                    ->title('Товар'),
                    Input::make('count')->required()->title('Кол - во')->type('number'),
            ])),

            Layout::modal('editOrderProduct', Layout::rows([
                Input::make('orderProduct.id')->type('hidden'),
                Select::make('orderProduct.order_id')
                    ->options(function ()
                    {
                        $notFinishOrders = [];
                        $orders = Order::all();

                        foreach ($orders as $id => $order) {
                            if ($order->is_complite === 0) {
                                $notFinishOrders[$order->id] = $order->id;
                            }
                        }

                        return $notFinishOrders;
                    })
                    ->required()
                    ->title('Заказ №'),
                Select::make('orderProduct.product_id')
                    ->options(function ()
                    {
                        $products = Product::all();
                        $productsArr = [];

                        foreach ($products as $id => $product) {
                            $productsArr[$id + 1] = $product->name;
                        }

                        return $productsArr;
                    })
                        ->required()
                        ->title('Товар'),
                    Input::make('orderProduct.count')->required()->title('Кол - во')->type('number'),
            ]))
            ->async('asyncGetorderProduct')
            ->applyButton('Изменить'),

            Layout::modal('deleteOrderProduct', Layout::rows([
                Input::make('orderProduct.id')->type('hidden'),
            ]))
            ->async('asyncGetorderProduct')
            ->applyButton('Удалить'),
        ];
    }

    public function createOrderProductFunc(Request $request) 
    {
        OrderProduct::create($request->all());
        Toast::info('Товар добавлен');
    }

    public function asyncGetorderProduct(OrderProduct $orderProduct)
    {
        return [
            'orderProduct' => $orderProduct,
        ];
    }

    public function updateOrderProduct(Request $request)
    {
        OrderProduct::find($request->input('orderProduct.id'))->update($request->orderProduct);
        Toast::info('Товар обновлён');
    }

    public function removeOrderProduct(Request $request)
    {
        OrderProduct::find($request->input('orderProduct.id'))->delete();
        Toast::info('Товар удалён');
    }
}
