<?php

namespace App\Filament\Resources\Galleries\RelationManagers;

use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Support\YoutubeHelper;
use Filament\Actions\EditAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Actions\DissociateBulkAction;
use Filament\Resources\RelationManagers\RelationManager;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Media Gallery')
                    ->schema([
                        Select::make('type')
                            ->label('Tipe Konten')
                            ->options([
                                'image' => 'Foto',
                                'video' => 'Video',
                            ])
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn ($state, callable $set) =>
                                $state === 'image' && $set('video_url', null)
                            ),

                        FileUpload::make('image')
                            ->label('Foto / Thumbnail')
                            ->image()
                            ->visibility('public')
                            ->directory('gallery/items')
                            ->disk('public')
                            ->visible(fn ($get) => in_array($get('type'), ['image', 'video']))
                            ->required(fn ($get) => $get('type') === 'image')
                            ->helperText('Thumbnail otomatis dari YouTube jika tipe konten video'),

                        TextInput::make('video_url')
                            ->label('URL Video YouTube')
                            ->visible(fn ($get) => $get('type') === 'video')
                            ->required(fn ($get) => $get('type') === 'video')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                if ($get('type') !== 'video') {
                                    return;
                                }

                                if (! $get('image')) {
                                    $thumbnail = YoutubeHelper::generateThumbnail($state);

                                    if ($thumbnail) {
                                        $set('image', $thumbnail);
                                    }
                                }
                            }),

                        TextInput::make('caption')
                            ->label('Caption'),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('type')
                    ->searchable(),
                ImageColumn::make('image')
                    ->disk('public')
                    ->visibility('public')
                    ->imageHeight(50),
                TextColumn::make('video_url')
                    ->searchable(),
                TextColumn::make('caption')
                    ->searchable(),
                TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
