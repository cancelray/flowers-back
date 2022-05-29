<?php

namespace App\Orchid\Screens\Products;

use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

use App\Models\Product;
use App\Models\Category;
use App\Models\Format;
use App\Models\Color;

class ProductsScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'products' => Product::paginate(20),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Продукты';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            
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
            Layout::table('products', [
                TD::make('name', title: 'Наименование')->width('200px'),
                TD::make('price', title: 'Цена (руб.)')->width('100px'),
                TD::make('category_id', title: 'Категория')
                    ->render(function (Product $product)
                        {
                            $categories = Category::all();
                            foreach($categories as $category) {
                                if ($product->category_id == $category->id) {
                                    return $category->name;
                                }
                            }
                        }),
                TD::make('composition', title: 'Композиция'),
                TD::make('format_id', title: 'Формат')                    
                    ->render(function (Product $product)
                    {
                        $formats = Format::all();
                        foreach($formats as $format) {
                            if ($product->format_id == $format->id) {
                                return $format->format;
                            }
                        }
                    }),
                TD::make('color_id', title: 'Цвет')
                    ->render(function (Product $product)
                    {
                        $colors = Color::all();
                        foreach($colors as $color) {
                            if ($product->color_id == $color->id) {
                                return $color->color;
                            }
                        }
                    }),
                    TD::make('created_at', title: 'Дата создания')->defaultHidden(),
                    TD::make('updated_at', title: 'Дата обновления')->defaultHidden(),
            ])
        ];
    }
}
