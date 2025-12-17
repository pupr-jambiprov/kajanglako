<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile Umum')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Profil')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(255),

                        RichEditor::make('description')
                            ->label('Deskripsi')
                            ->maxLength(500)
                            ->columnSpanFull(),
                        FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('profiles')
                            ->maxSize(1024)
                            ->columnSpanFull(),
                        FileUpload::make('cover_image')
                            ->label('Gambar Sampul')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('profiles')
                            ->columnSpanFull(),

                    ])
                    // ->columnSpanFull()
                    ->columns(2),
                Section::make('Sosial Media dan Kontak Lainnya')
                    ->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->label('Telepon')
                            ->maxLength(20),
                        TextInput::make('address')
                            ->label('Alamat')
                            ->maxLength(500),
                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->maxLength(255),
                        TextInput::make('youtube')
                            ->label('YouTube')
                            ->maxLength(255),
                        TextInput::make('website')
                            ->label('Website')
                            ->maxLength(255),
                    ])
                    // ->columnSpanFull()
                    ->columns(1),
            ]);
    }
}
