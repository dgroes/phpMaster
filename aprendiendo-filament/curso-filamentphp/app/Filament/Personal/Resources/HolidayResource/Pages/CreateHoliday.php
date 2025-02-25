<?php

namespace App\Filament\Personal\Resources\HolidayResource\Pages;

use App\Filament\Personal\Resources\HolidayResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateHoliday extends CreateRecord
{
    protected static string $resource = HolidayResource::class;

    /* C12: Modificar o agregar datos antes de guardar los datos en la BD */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::user()->id; //Rellenar automáticamente "Nombre"
        $data['type'] = 'pending'; //Rellenar automáticamente el "Tipo"

        return $data;
    }
}
