<?php

namespace App\Orchid\Layouts\Categories;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use App\Models\Category;

use Orchid\Screen\Actions\ModalToggle;

class CategoriesTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('100px')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('name', 'Наименование')->width('500px')->sort()->filter(TD::FILTER_TEXT),
            TD::make('translate_name', 'Переведенное имя')->width('400px')->sort(),
            TD::make('created_at', 'Дата создания')->defaultHidden()->sort()->filter(TD::FILTER_DATE),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()->sort()->filter(TD::FILTER_DATE),
            TD::make('action', 'Редактировать')
                ->defaultHidden()
                ->render(function (Category $category)
                    {
                        return ModalToggle::make('Редактировать')
                            ->modal('editCategory')
                            ->method('updateCategory')
                            ->modalTitle('Редактирование '.'"'.$category->name.'"')
                            ->asyncParameters([
                                'category' => $category->id, 
                            ]);
                    }),
            TD::make('action', 'Удалить')
                ->defaultHidden()
                ->render(function (Category $category)
                    {
                        return ModalToggle::make('Удалить')
                            ->modal('deleteCategory')
                            ->method('removeCategory')
                            ->modalTitle('Подтвердите удаление '.'"'.$category->name.'"')
                            ->asyncParameters([
                                'category' => $category->id, 
                            ]);
                    }),
        ];
    }
}
