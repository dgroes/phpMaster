<?php

namespace App\Filament\Personal\Resources\TimesheetResource\Pages;

use App\Filament\Personal\Resources\TimesheetResource;
use App\Models\Timesheet;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListTimesheets extends ListRecords
{
    protected static string $resource = TimesheetResource::class;

    protected function getHeaderActions(): array
    {

        //Obtener el ultimó timesheet que se agregó
        $lastTimesheet = Timesheet::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        // Para evitar erores al tener un list de timesheet vacio
        if ($lastTimesheet == null) {
            return [
                Action::make('inWork')
                    ->label('Entrar a trabajar')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function () {
                        $user = Auth::user();
                        $timesheet = new Timesheet();
                        $timesheet->calendar_id = 1;
                        $timesheet->user_id = $user->id;
                        $timesheet->day_in = Carbon::now();
                        $timesheet->type = 'work';
                        $timesheet->save();
                    }),
                Actions\CreateAction::make(),

            ];
        }

        return [
            /* C13: Header Actions */
            Action::make("inWork")
                ->label("Entrar a Trabajar") //Texto del action
                ->keyBindings(['command+q', 'alt+1'])
                ->color('success') //Color del botón
                /*  ->visible(!$lastTimesheet || $lastTimesheet->day_out !== null) // Verifica si $lastTimesheet es null
                ->disabled($lastTimesheet && $lastTimesheet->day_out === null) // Solo deshabilita si hay un registro sin salida */
                ->visible(!$lastTimesheet->day_out == null)
                ->disabled($lastTimesheet->day_out == null)
                ->requiresConfirmation() //Modal de confirmación
                ->action(function () {
                    $user = Auth::user();
                    $timesheet = new Timesheet();
                    $timesheet->calendar_id = 1;
                    $timesheet->user_id = $user->id;
                    $timesheet->day_in = Carbon::now();

                    $timesheet->type = 'work';
                    $timesheet->save();

                    /* C15: Notifiación de acción */
                    Notification::make()
                        ->title("Has entrado a trabajar 👷")
                        // ->icon('heroicon-o-document-text')
                        ->color('success')
                        ->success()
                        ->body('Haz comanezado a trabajar a las: ' . Carbon::now()->format('H:i:s') . ' Espero que tengas un exelente turno de trabajo 👍')
                        ->send();
                }),
            Action::make("stopWork")
                ->label("Parar de Trabajar")
                ->keyBindings(['command+q', 'alt+2'])
                ->color('success')
                /* ->visible($lastTimesheet && $lastTimesheet->day_out === null && $lastTimesheet->type !== 'pause')
                ->disabled(!$lastTimesheet || $lastTimesheet->day_out !== null) */
                ->visible($lastTimesheet->day_out == null && $lastTimesheet->type != 'pause')
                ->disabled(!$lastTimesheet->day_out == null)
                ->requiresConfirmation()
                ->action(function () use ($lastTimesheet) {
                    $lastTimesheet->day_out = Carbon::now();
                    $lastTimesheet->save();

                    /* C15: Notifiación de acción */
                    Notification::make()
                        ->title("Has terminado de trabajar 🥳")
                        ->color('cyan') //Se agrega un color de Filament
                        ->success()
                        ->body('Haz terminado de trabajar a las: ' . Carbon::now()->format('H:i:s') . ' Espero que tengas un exelente descanzo y nos vemos 😃')
                        ->send();
                }),
            Action::make("inPause")
                ->label("Comenzar Pausa")
                ->keyBindings(['command+q', 'alt+3']) //Comando para ejecutar la acción
                ->color('info')
                ->requiresConfirmation()
                /*  ->visible(!$lastTimesheet || ($lastTimesheet->day_out === null && $lastTimesheet->type !== 'pause')) // Verifica si $lastTimesheet es null
                ->disabled($lastTimesheet && $lastTimesheet->day_out === null) // Solo deshabilita si hay un registro sin salida */
                ->visible($lastTimesheet->day_out == null && $lastTimesheet->type != 'pause')
                ->disabled(!$lastTimesheet->day_out == null)
                ->action(function () use ($lastTimesheet) {
                    $lastTimesheet->day_out = Carbon::now();
                    $lastTimesheet->save();
                    $timesheet = new Timesheet();
                    $timesheet->calendar_id = 1;
                    $timesheet->user_id = Auth::user()->id;
                    $timesheet->day_in = Carbon::now();
                    $timesheet->type = 'pause';
                    $timesheet->save();

                     /* C15: Notifiación de acción */
                     Notification::make()
                     ->title("Comienza tu tiempo de pausa 🛑")
                     ->color('info')
                     ->info()
                     ->send();
                }),
            Action::make("stopPause")
                ->label("Parar Pausa")
                ->keyBindings(['command+q', 'alt+4'])
                ->color('info')
                /* ->visible($lastTimesheet && $lastTimesheet->day_out === null && $lastTimesheet->type === 'pause') // Verifica si hay un registro antes de acceder a sus propiedades
                ->disabled(!$lastTimesheet || $lastTimesheet->day_out !== null) // Evita error si $lastTimesheet es null */
                ->visible($lastTimesheet->day_out == null && $lastTimesheet->type == 'pause')
                ->disabled(!$lastTimesheet->day_out == null)
                ->requiresConfirmation()
                ->action(function () use ($lastTimesheet) {
                    $lastTimesheet->day_out = Carbon::now();
                    $lastTimesheet->save();
                    $timesheet = new Timesheet();
                    $timesheet->calendar_id = 1;
                    $timesheet->user_id = Auth::user()->id;
                    $timesheet->day_in = Carbon::now();
                    $timesheet->type = 'work';
                    $timesheet->save();

                     /* C15: Notifiación de acción */
                     Notification::make()
                     ->title("Has terminado tu tiempo de pausa, de nuevo al trabajo 👷")
                     ->color('info')
                     ->info()
                     ->send();
                }),
            Actions\CreateAction::make(),

        ];
    }
}
