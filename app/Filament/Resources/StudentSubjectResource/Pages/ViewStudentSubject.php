<?php

namespace App\Filament\Resources\StudentSubjectResource\Pages;

use App\Filament\Resources\StudentSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStudentSubject extends ViewRecord
{
    protected static string $resource = StudentSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
