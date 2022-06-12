<?php

namespace App\Orchid\Screens\Favorite;

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

use App\Orchid\Layouts\Favorites\FavoritesTable;

use App\Models\Favorite;
use App\Models\Product;

class FavoritesScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'favorites' => Favorite::filters()->paginate(20),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Популярные товары';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Добавить популярные товар')->modal('createFavorite')->method('createFavoriteFunc'),
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
            FavoritesTable::class,

            Layout::modal('createFavorite', Layout::rows([
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
            ])),

            Layout::modal('editFavorite', Layout::rows([
                Input::make('favorite.id')->type('hidden'),
                Select::make('favorite.product_id')
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
            ]))
            ->async('asyncGetFavorite')
            ->applyButton('Изменить'),

            Layout::modal('deleteFavorite', Layout::rows([
                Input::make('favorite.id')->type('hidden'),
            ]))
            ->async('asyncGetFavorite')
            ->applyButton('Удалить'),
        ];
    }

    public function createFavoriteFunc(Request $request) 
    {
        Favorite::create($request->all());
        Toast::info('Товар добавлен');
    }

    public function asyncGetFavorite(Favorite $favorite)
    {
        return [
            'favorite' => $favorite,
        ];
    }

    public function updateFavorite(Request $request)
    {
        Favorite::find($request->input('favorite.id'))->update($request->favorite);
        Toast::info('Товар обновлён');
    }

    public function removeFavorite(Request $request)
    {
        Favorite::find($request->input('favorite.id'))->delete();
        Toast::info('Товар удалён');
    }
}

