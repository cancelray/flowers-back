<?php

namespace App\Orchid\Screens\Category;

use Illuminate\Http\Request;

use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\ModalToggle;

use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Categories\CategoriesTable;

use App\Models\Category;

class CategoriesScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categories' => Category::filters()->paginate(20),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Категории';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать категорию')->modal('createCategory')->method('createCategoryFunc'),
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
            CategoriesTable::class,

            Layout::modal('createCategory', Layout::rows([
                Input::make('name')->required()->title('Наименование'),
                Input::make('translate_name')->required()->title('Переведенное Наименование')
                    ->help('Наименование на аглийском для отображения в строке браузера (без пробелов)'),
                Group::make([
                    DateTimer::make('created_at')->title('Создан'),
                    DateTimer::make('updated_at')->title('Изменен'),
                ]),
            ]))
            ->title('Создать категорию')
            ->applyButton('Создать'),

            Layout::modal('editCategory', Layout::rows([
                Input::make('category.id')->type('hidden'),
                Input::make('category.name')->required()->title('Наименование'),
                Input::make('category.translate_name')->required()->title('Переведенное Наименование')
                    ->help('Наименование на аглийском для отображения в строке браузера (без пробелов)'),
                Group::make([
                    DateTimer::make('category.created_at')->title('Создан'),
                    DateTimer::make('category.updated_at')->title('Изменен'),
                ]),
            ]))
            ->async('asyncGetCategory')
            ->applyButton('Изменить'),

            Layout::modal('deleteCategory', Layout::rows([
                Input::make('category.id')->type('hidden'),
            ]))
            ->async('asyncGetCategory')
            ->applyButton('Удалить'),
        ];
    }

    public function createCategoryFunc(Request $request) 
    {
        Category::create($request->all());
        Toast::info('Категория добавлена');
    }

    public function asyncGetCategory(Category $category)
    {
        return [
            'category' => $category,
        ];
    }

    public function updateCategory(Request $request)
    {
        Category::find($request->input('category.id'))->update($request->category);
        Toast::info('Категоиря обновлена');
    }

    public function removeCategory(Request $request)
    {
        Category::find($request->input('category.id'))->delete();
        Toast::info('Категория удалена');
    }
}
