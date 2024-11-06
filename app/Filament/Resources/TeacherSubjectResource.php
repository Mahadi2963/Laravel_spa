<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherSubjectResource\Pages;
use App\Models\TeacherSubject;
use App\Models\Teacher;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TeacherSubjectResource extends Resource
{
    protected static ?string $model = TeacherSubject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('teacher_id')
                    ->label('Teacher')
                    ->relationship('teacher', 'teacher_name') // Assuming "teacher_name" is a field in Teacher model
                    ->required()
                    ->searchable(),

                Forms\Components\Select::make('subject_id')
                    ->label('Subject')
                    ->relationship('subject', 'name') // Assuming "name" is a field in Subject model
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('teacher.teacher_name')
                    ->label('Teacher')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('subject.name')
                    ->label('Subject')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Assigned On')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated On')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Define any filters if needed
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define relations if necessary
        ];
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.teacher-subjects.index');
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeacherSubjects::route('/'),
            'create' => Pages\CreateTeacherSubject::route('/create'),
            'view' => Pages\ViewTeacherSubject::route('/{record}'),
            'edit' => Pages\EditTeacherSubject::route('/{record}/edit'),
        ];
    }
}
