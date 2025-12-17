<?php

namespace App\Filament\Resources\Slides\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class SlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Konten Slider')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->maxLength(255),

                        Textarea::make('subtitle')
                            ->label('Subjudul / Tagline')
                            ->maxLength(255),
                    ])
                    ->columns(1),

                Section::make('Gambar & Status')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar Slider')
                            ->required()
                            ->image()
                            // ->imageEditor()
                            ->disk('public')
                            ->directory('sliders')
                            ->visibility('public')
                            ->preserveFilenames(false)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->helperText('Nonaktifkan untuk menyembunyikan slider tanpa menghapus'),
                    ])
                    ->columns(1),
            ]);
    }
}
