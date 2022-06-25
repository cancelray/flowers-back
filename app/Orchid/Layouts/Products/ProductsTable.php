<?php

namespace App\Orchid\Layouts\Products;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use App\Models\Product;
use App\Models\Category;
use App\Models\Format;
use App\Models\Color;

use Orchid\Screen\Actions\ModalToggle;

class ProductsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'products';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('100px')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('name', 'Наименование')->width('200px')->sort()->filter(TD::FILTER_TEXT),
            TD::make('price', 'Цена (руб.)')->width('100px')->sort(),
            TD::make('category_id', 'Категория')
                ->render(function (Product $product)
                    {
                        $categories = Category::all();
                        foreach($categories as $category) {
                            if ($product->category_id == $category->id) {
                                return $category->name;
                            }
                        }
                    })
                    ->sort(),
            TD::make('composition', 'Композиция')->filter(TD::FILTER_TEXT),
            TD::make('format_id', 'Формат')                    
                ->render(function (Product $product)
                {
                    $formats = Format::all();
                    foreach($formats as $format) {
                        if ($product->format_id == $format->id) {
                            return $format->format;
                        }
                    }
                })
                ->sort(),
            TD::make('color_id', 'Цвет')
                ->render(function (Product $product)
                {
                    $colors = Color::all();
                    foreach($colors as $color) {
                        if ($product->color_id == $color->id) {
                            return $color->color;
                        }
                    }
                })
                ->sort(),
                TD::make('img', 'Картинка')
                    ->render(function (Product $product)
                    {
                       $productImg = "<img src=/public/".$product->img." width=100px>";

                        return $productImg;
                    })
                    ->defaultHidden(),
                TD::make('created_at', 'Дата создания')->defaultHidden()->sort()->filter(TD::FILTER_DATE),
                TD::make('updated_at', 'Дата обновления')->defaultHidden()->sort()->filter(TD::FILTER_DATE),
                TD::make('action', 'Редактировать')
                    ->defaultHidden()
                    ->render(function (Product $product)
                        {
                            return ModalToggle::make('Редактировать')
                                ->modal('editProduct')
                                ->method('updateProduct')
                                ->modalTitle('Редактирование '.'"'.$product->name.'"')
                                ->asyncParameters([
                                    'product' => $product->id, 
                                ]);
                        }),
                TD::make('action', 'Удалить')
                    ->defaultHidden()
                    ->render(function (Product $product)
                        {
                            return ModalToggle::make('Удалить')
                                ->modal('deleteProduct')
                                ->method('removeProduct')
                                ->modalTitle('Подтвердите удаление '.'"'.$product->name.'"')
                                ->asyncParameters([
                                    'product' => $product->id, 
                                ]);
                        }),
        ];
    }
}
