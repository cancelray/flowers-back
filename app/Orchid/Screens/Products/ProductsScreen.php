<?php

namespace App\Orchid\Screens\Products;

use Illuminate\Http\Request;

use Orchid\Attachment\File;

use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;

use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Products\ProductsTable;

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
            'products' => Product::filters()->paginate(20),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Товары';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать товар')->modal('createProduct')->method('createProductFunc'),
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
            ProductsTable::class,

            Layout::modal('createProduct', Layout::rows([
                Input::make('name')->required()->title('Наименование'),
                Input::make('translate_name')->required()->title('Переведенное Наименование')
                    ->help('Наименование на аглийском для отображения в строке браузера (без пробелов)'),
                Input::make('price')->required()->title('Цена')->type('number'),
                Select::make('category_id')
                ->options(function ()
                {
                    $categories = [];
                    $categoriesTable = Category::all();
                    unset($categoriesTable[0]);

                    foreach($categoriesTable as $id => $category) {
                        $categories[$id + 1] = $category->name;
                    }
            
                    return $categories;
                })
                ->required()
                ->title('Категория'),
                Input::make('composition')->required()->title('Композиция'),
                Group::make([
                    Relation::make('format_id')
                    ->fromModel(Format::class, 'format')
                    ->required()
                    ->title('Формат'),
                    Relation::make('color_id')
                    ->fromModel(Color::class, 'color')
                    ->required()
                    ->title('Цвет'),
                ]),
                Cropper::make('img')->targetRelativeUrl()->title('Фото товара'),
                // Upload::make('image')
                // ->groups('photo')
                // ->title('Фото товара'),
                // Input::make('img')
                // ->placeholder(function ()
                //     {
                //         $image = attachment()->first();
                //         return $image->url();
                //     })
                // ->title('Адресс фото товара'),
                Group::make([
                    DateTimer::make('created_at')->title('Создан'),
                    DateTimer::make('updated_at')->title('Изменен'),
                ]),
            ]))
            ->title('Создать товар')
            ->applyButton('Создать'),

            Layout::modal('editProduct', Layout::rows([
                Input::make('product.id')->type('hidden'),
                Input::make('product.name')->required()->title('Наименование'),
                Input::make('product.translate_name')->required()->title('Переведенное Наименование (без пробелов)')
                    ->help('Наименование на аглийском для отображения в строке браузера'),
                Input::make('product.price')->required()->title('Цена')->type('number'),
                Select::make('product.category_id')
                ->options(function ()
                {
                    $categories = [];
                    $categoriesTable = Category::all();
                    unset($categoriesTable[0]);

                    foreach($categoriesTable as $id => $category) {
                        $categories[$id + 1] = $category->name;
                    }
            
                    return $categories;
                })
                ->required()
                ->title('Категория'),
                Input::make('product.composition')->required()->title('Композиция'),
                Group::make([
                    Relation::make('product.format_id')
                    ->fromModel(Format::class, 'format')
                    ->required()
                    ->title('Формат'),
                    Relation::make('product.color_id')
                    ->fromModel(Color::class, 'color')
                    ->required()
                    ->title('Цвет'),
                ]),
                Cropper::make('product.img')->targetRelativeUrl()->title('Фото товара'),
                Group::make([
                    DateTimer::make('product.created_at')->title('Создан'),
                    DateTimer::make('product.updated_at')->title('Изменен'),
                ]),
            ]))
            ->async('asyncGetProduct')
            ->applyButton('Изменить'),

            Layout::modal('deleteProduct', Layout::rows([
                Input::make('product.id')->type('hidden'),
            ]))
            ->async('asyncGetProduct')
            ->applyButton('Удалить'),
        ];
    }

    public function createProductFunc(Request $request) 
    {
        Product::create($request->all());
        Toast::info('Товар добавлен');
    }

    public function asyncGetProduct(Product $product)
    {
        return [
            'product' => $product,
        ];
    }

    public function updateProduct(Request $request)
    {
        Product::find($request->input('product.id'))->update($request->product);
        Toast::info('Товар обновлён');
    }

    public function removeProduct(Request $request)
    {
        Product::find($request->input('product.id'))->delete();
        Toast::info('Товар удалён');
    }
}