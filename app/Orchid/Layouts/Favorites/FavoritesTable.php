<?php

namespace App\Orchid\Layouts\Favorites;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use App\Models\Favorite;
use App\Models\Product;

use Orchid\Screen\Actions\ModalToggle;

class FavoritesTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'favorites';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('100px')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('product_id', 'Товар')
                ->render(function (Favorite $favorite)
                {
                    $products = Product::all();
                    foreach($products as $product) {
                        if ($product->id == $favorite->product_id) {
                            return $product->name;
                        }
                    }
                })
                ->sort()
                ->filter(TD::FILTER_NUMERIC),
            TD::make('action', 'Редактировать')
                ->render(function (Favorite $favorite)
                    {
                        return ModalToggle::make('Редактировать')
                            ->modal('editFavorite')
                            ->method('updateFavorite')
                            ->modalTitle('Редактирование '.'"'.$favorite->name.'"')
                            ->asyncParameters([
                                'favorite' => $favorite->id, 
                            ]);
                    }),
            TD::make('action', 'Удалить')
                ->render(function (Favorite $favorite)
                    {
                        return ModalToggle::make('Удалить')
                            ->modal('deleteFavorite')
                            ->method('removeFavorite')
                            ->modalTitle('Подтвердите удаление')
                            ->asyncParameters([
                                'favorite' => $favorite->id, 
                            ]);
                    }),
        ];
    }
}
