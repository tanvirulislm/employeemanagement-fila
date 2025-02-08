<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\City;
use Filament\Tables;
use App\Models\State;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Employee';

    protected static ?string $navigationGroup = 'Employee Management';

    protected static ?string $modelLabel = 'Employee';

    protected static ?string $recordTitleAttribute = 'first_name';

    public static function getGlobalSearchResultTitle(Model $record): string{
        return $record->first_name . ' ' . $record->last_name;
    }

    public static function getGloballySearchableAttributes(): array{
        return ['first_name', 'last_name', 'middle_name', 'address', 'country.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array{
        return [
            'Country' => $record->country->name,
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder{
        return parent::getGlobalSearchEloquentQuery()
            ->with(['country']);
    }

    public static function getNavigationBadge(): ?string{
        return static::getModel()::count();
    }

    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('Employee Details')->description('Enter employee details')->schema([
                Forms\Components\Select::make('country_id')
                ->relationship('country','name')
                ->searchable()
                ->preload()
                ->afterStateUpdated(function (Set $set) {
                   $set('state_id', null);
                    $set('city_id', null);
                })
                ->live()
                ->required(),
                Forms\Components\Select::make('state_id')
                    ->options(fn (Get $get): Collection => State::query()
                    ->where('country_id', $get('country_id'))
                    ->pluck('name', 'id'))
                    ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('city_id')
                    ->options(fn (Get $get): Collection => City::query()
                    ->where('state_id', $get('state_id'))
                    ->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('department_id')
                    ->relationship('department','name')
                    ->searchable()
                    ->preload()
                    ->required(), 
            ])->columns(2),
            Forms\Components\Section::make('Employee Name')->description('Enter employee name')->schema([
                Forms\Components\TextInput::make('first_name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('middle_name')
                ->required()
                ->maxLength(255),
            ])->columns(3),
            Forms\Components\Section::make('Address')->description('Enter employee address and zip code')->schema([
                Forms\Components\TextInput::make('address')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('zip_code')
                ->required()
                ->maxLength(255),
            ])->columns(2),
            Forms\Components\Section::make('Dates')->description('Enter birth date and date hired')->schema([
                Forms\Components\DatePicker::make('birth_date')
                ->required()
                ->native(false),
                Forms\Components\DatePicker::make('date_hired')
                ->required()
                ->native(false),
            ])->columns(2),               
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('zip_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('date_hired')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('Department')
                ->relationship('department', 'name')
                ->searchable()
                ->preload()
                ->label('Filter by Department')
                ->indicator('Department'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                    ->success()
                    ->title('Employee Deleted.')
                    ->body('The employee has been deleted successfully.')
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
    return $infolist
        ->schema([
            Section::make('Employee Details')
            ->schema([
                TextEntry::make('country.name')
                ->label('Country Name'),
                TextEntry::make('state.name')
                ->label('State Name'),
                TextEntry::make('city.name')
                ->label('City Name'),
                TextEntry::make('department.name')
                ->label('Department Name'),
            ])->columns(2),
            Section::make('Employee Details')
            ->schema([
                TextEntry::make('first_name')
                ->label('First Name'),
                TextEntry::make('last_name')
                ->label('Last Name'),
                TextEntry::make('middle_name')
                ->label('Middle Name'),
            ])->columns(3),
            Section::make('Employee Address')
            ->schema([
                TextEntry::make('address')
                ->label('Address'),
                TextEntry::make('zip_code')
                ->label('Zip Code'),
            ])->columns(2),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
