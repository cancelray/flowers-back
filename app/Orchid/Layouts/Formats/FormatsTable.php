<?php

namespace App\Orchid\Layouts\Formats;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use App\Models\Format;

use Orchid\Screen\Actions\ModalToggle;

class FormatsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'formats';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('100px')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('format', 'Наименование')->width('500px')->sort()->filter(TD::FILTER_TEXT),
            TD::make('for_checkbox', 'Имя для чекбокса')->width('400px')->sort(),
            TD::make('created_at', 'Дата создания')->defaultHidden()->sort()->filter(TD::FILTER_DATE),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()->sort()->filter(TD::FILTER_DATE),
            TD::make('action', 'Редактировать')
                ->defaultHidden()
                ->render(function (Format $format)
                    {
                        return ModalToggle::make('Редактировать')
                            ->modal('editFormat')
                            ->method('updateFormat')
                            ->modalTitle('Редактирование '.'"'.$format->format.'"')
                            ->asyncParameters([
                                'format' => $format->id, 
                            ]);
                    }),
        TD::make('action', 'Удалить')
            ->defaultHidden()
            ->render(function (Format $format)
                {
                    return ModalToggle::make('Удалить')
                        ->modal('deleteFormat')
                        ->method('removeFormat')
                        ->modalTitle('Подтвердите удаление '.'"'.$format->format.'"')
                        ->asyncParameters([
                            'format' => $format->id, 
                        ]);
                }),
        ];
    }
}
