<?php

namespace App\Orchid\Screens\Colors;

use Illuminate\Http\Request;

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

use App\Orchid\Layouts\Colors\ColorsTable;

use App\Models\Color;

class ColorsScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'colors' => Color::filters()->paginate(20),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Цвета';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать цвет')->modal('createColor')->method('createColorFunc'),
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
            ColorsTable::class,

            Layout::modal('createColor', Layout::rows([
                Input::make('color')->required()->title('Наименование'),
                Input::make('for_checkbox')->required()->title('Имя для чекбокса')
                    ->help('Наименование на аглийском для чекбокса (без пробелов)'),
                Group::make([
                    DateTimer::make('created_at')->title('Создан'),
                    DateTimer::make('updated_at')->title('Изменен'),
                ])
            ]))
            ->title('Создать цвет')
            ->applyButton('Создать'),

            Layout::modal('editColor', Layout::rows([
                Input::make('color.id')->type('hidden'),
                Input::make('color.color')->required()->title('Наименование'),
                Input::make('color.for_checkbox')->required()->title('Переведенное Наименование')
                    ->help('Наименование на аглийском для чекбокса (без пробелов)'),
                Group::make([
                    DateTimer::make('color.created_at')->title('Создан'),
                    DateTimer::make('color.updated_at')->title('Изменен'),
                ]),
            ]))
            ->async('asyncGetColor')
            ->applyButton('Изменить'),

            Layout::modal('deleteColor', Layout::rows([
                Input::make('color.id')->type('hidden'),
            ]))
            ->async('asyncGetColor')
            ->applyButton('Удалить'),
        ];
    }

    public function createColorFunc(Request $request) 
    {
        Color::create($request->all());
        Toast::info('Цвет добавлен');
    }

    public function asyncGetColor(Color $color)
    {
        return [
            'color' => $color,
        ];
    }

    public function updateColor(Request $request)
    {
        Color::find($request->input('color.id'))->update($request->color);
        Toast::info('Цвет обновлён');
    }

    public function removeColor(Request $request)
    {
        Color::find($request->input('color.id'))->delete();
        Toast::info('Цвет удалён');
    }
}
