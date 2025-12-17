<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Member Information')
                    ->components([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('role')
                            ->label('Jabatan')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('bio')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
                Section::make('Additional Details')
                    ->components([
                        FileUpload::make('photo')
                            ->label('Foto')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('members')
                            ->preserveFilenames(false)
                            ->imageEditor()
                            ->imagePreviewHeight('200')
                            ->maxSize(2048)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
