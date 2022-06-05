<?php

namespace App\Orchid\Layouts\Colors;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use App\Models\Color;

use Orchid\Screen\Actions\ModalToggle;

class ColorsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'colors';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('100px')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('color', 'Наименование')->width('500px')->sort()->filter(TD::FILTER_TEXT),
            TD::make('for_checkbox', 'Имя для чекбокса')->width('400px')->sort(),
            TD::make('created_at', 'Дата создания')->defaultHidden()->sort()->filter(TD::FILTER_DATE),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()->sort()->filter(TD::FILTER_DATE),
            TD::make('action', 'Редактировать')
                ->defaultHidden()
                ->render(function (Color $color)
                    {
                        return ModalToggle::make('Редактировать')
                            ->modal('editColor')
                            ->method('updateColor')
                            ->modalTitle('Редактирование '.'"'.$color->color.'"')
                            ->asyncParameters([
                                'color' => $color->id, 
                            ]);
                    }),
        TD::make('action', 'Удалить')
            ->defaultHidden()
            ->render(function (Color $color)
                {
                    return ModalToggle::make('Удалить')
                        ->modal('deleteColor')
                        ->method('removeColor')
                        ->modalTitle('Подтвердите удаление '.'"'.$color->color.'"')
                        ->asyncParameters([
                            'color' => $color->id, 
                        ]);
                }),
        ];
    }
}
