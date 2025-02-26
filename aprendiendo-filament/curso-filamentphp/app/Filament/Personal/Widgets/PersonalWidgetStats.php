<?php

namespace App\Filament\Personal\Widgets;

use App\Models\Holiday;
use App\Models\Timesheet;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class PersonalWidgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Pending Holidays', $this->getPendingHoliday(Auth::user())),
            Stat::make('Approved Holidays',  $this->getApprovedHoliday(Auth::user())),
            Stat::make('Total Hours Worker', $this->getTotalWork(Auth::user())),
            Stat::make('Total Pause', $this->getTotalPause(Auth::user())),
        ];
    }


    //Función para sacar las Vacaciones pendientes del usuario logeado
    protected function getPendingHoliday(User $user)
    {
        $totalPendingHolidays = Holiday::where('user_id', $user->id)
            ->where('type', 'pending')->get()->count();

        return $totalPendingHolidays;
    }

    //Función para sacar las Vacaciones aprovadas del usuario logeado
    protected function getApprovedHoliday(User $user)
    {
        $totalApprovedHolidays = Holiday::where('user_id', $user->id)
            ->where('type', 'approved')->get()->count();

        return $totalApprovedHolidays;
    }

    //Función para sacar las Horas tabajadas por usuario logeado
    /*  protected function getTotalWork(User $user){
        $timesheets = Timesheet::where('user_id', $user->id)
            ->where('type','work')->get();
        $sumSeconds = 0;
        foreach ($timesheets as $timesheet) {
            # code...
            $startTime = Carbon::parse($timesheet->day_in);
            $finishTime = Carbon::parse($timesheet->day_out);

            $totalDuration = $finishTime->diffInSeconds($startTime);
            $sumSeconds = $sumSeconds + $totalDuration;

        }
        $tiempoFormato = gmdate("H:i:s", $sumSeconds);

        return $tiempoFormato;

    } */




    protected function getTotalWork(User $user)
    {
        // Obtener la suma total de segundos directamente desde la base de datos
        $sumSeconds = Timesheet::where('user_id', $user->id)
            ->where('type', 'work')
            ->whereNotNull('day_in')
            ->whereNotNull('day_out') // Evita registros sin salida
            ->get()
            ->sum(function ($timesheet) {
                return Carbon::parse($timesheet->day_out)->diffInSeconds(Carbon::parse($timesheet->day_in));
            });

        // Convertir a formato HH:mm:ss
        return CarbonInterval::seconds($sumSeconds)->cascade()->format('%H:%I:%S');
    }




    protected function getTotalPause(User $user)
    {
        // Obtener la suma total de segundos directamente desde la base de datos
        $sumSeconds = Timesheet::where('user_id', $user->id)
            ->where('type', 'pause')
            ->whereNotNull('day_in')
            ->whereNotNull('day_out') // Evita registros sin salida
            ->get()
            ->sum(function ($timesheet) {
                return Carbon::parse($timesheet->day_out)->diffInSeconds(Carbon::parse($timesheet->day_in));
            });

        // Convertir a formato HH:mm:ss
        return CarbonInterval::seconds($sumSeconds)->cascade()->format('%H:%I:%S');
    }

}
