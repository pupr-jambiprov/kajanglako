<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Utilities\Set;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Event Details')
                    ->schema([

                        TextInput::make('title')
                            ->label('Judul Berita')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) =>
                                $operation === 'create' ? $set('slug', \Str::slug($state)) : null
                            ),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->readOnly()
                            ->unique(ignoreRecord: true),

                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('location'),

                        RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),

                        DatePicker::make('event_date')
                            ->required(),

                        TimePicker::make('event_time'),


                        FileUpload::make('thumbnail')
                            ->label('Gambar Utama')
                            ->image()
                            ->directory('events/images')
                            ->visibility('public')
                            ->disk('public')
                            ->columnSpanFull(),

                        Toggle::make('is_published')
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->columns(2),
                // TextInput::make('category_id')
                //     ->required()
                //     ->numeric(),
                // TextInput::make('title')
                //     ->required(),
                // TextInput::make('slug')
                //     ->required(),
                // Textarea::make('description')
                //     ->required()
                //     ->columnSpanFull(),
                // DatePicker::make('event_date')
                //     ->required(),
                // TimePicker::make('event_time'),
                // TextInput::make('location'),
                // TextInput::make('thumbnail'),
                // Toggle::make('is_published')
                //     ->required(),
            ]);
    }
}
