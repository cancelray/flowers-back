<?php

namespace App\Orchid\Screens\Formats;

use Illuminate\Http\Request;

use Orchid\Attachment\File;

use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;

use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Formats\FormatsTable;

use App\Models\Format;

class FormatsScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'formats' => Format::filters()->paginate(20),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Форматы';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать формат')->modal('createFormat')->method('createFormatFunc'),
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
            FormatsTable::class,

            Layout::modal('createFormat', Layout::rows([
                Input::make('format')->required()->title('Наименование'),
                Input::make('for_checkbox')->required()->title('Имя для чекбокса')
                    ->help('Наименование на аглийском для чекбокса (без пробелов)'),
                Group::make([
                    DateTimer::make('created_at')->title('Создан'),
                    DateTimer::make('updated_at')->title('Изменен'),
                ])
            ]))
            ->title('Создать формат')
            ->applyButton('Создать'),

            Layout::modal('editFormat', Layout::rows([
                Input::make('format.id')->type('hidden'),
                Input::make('format.format')->required()->title('Наименование'),
                Input::make('format.for_checkbox')->required()->title('Переведенное Наименование')
                    ->help('Наименование на аглийском для чекбокса (без пробелов)'),
                Group::make([
                    DateTimer::make('format.created_at')->title('Создан'),
                    DateTimer::make('format.updated_at')->title('Изменен'),
                ]),
            ]))
            ->async('asyncGetFormat')
            ->applyButton('Изменить'),

            Layout::modal('deleteFormat', Layout::rows([
                Input::make('format.id')->type('hidden'),
            ]))
            ->async('asyncGetFormat')
            ->applyButton('Удалить'),
        ];
    }

    public function createFormatFunc(Request $request) 
    {
        Format::create($request->all());
        Toast::info('Формат добавлен');
    }

    public function asyncGetFormat(Format $format)
    {
        return [
            'format' => $format,
        ];
    }

    public function updateFormat(Request $request)
    {
        Format::find($request->input('format.id'))->update($request->format);
        Toast::info('Формат обновлён');
    }

    public function removeFormat(Request $request)
    {
        Format::find($request->input('format.id'))->delete();
        Toast::info('Формат удалён');
    }
}
