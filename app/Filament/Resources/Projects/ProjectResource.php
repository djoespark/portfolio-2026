<?php

namespace App\Filament\Resources\Projects;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\Projects\Pages\ListProjects;
use App\Models\Project;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static string | null $model = Project::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static string | null $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->label('Titre')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('category')
                    ->label('Catégorie'),

                TagsInput::make('tech_stack')
                    ->label('Technologies')
                    ->required(),

                Textarea::make('description_short')
                    ->label('Description courte')
                    ->required()
                    ->rows(3),

                RichEditor::make('description_full')
                    ->label('Description complète')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('thumbnail')
                    ->label('Image de couverture')
                    ->image()
                    ->directory('projects'),

                TextInput::make('github_url')
                    ->label('Lien GitHub')
                    ->url(),

                TextInput::make('demo_url')
                    ->label('Lien Démo')
                    ->url(),

                Toggle::make('is_featured')
                    ->label('Mettre en avant'),

                TextInput::make('order')
                    ->label("Ordre d'affichage")
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('category'),
                IconColumn::make('is_featured')->boolean(),
                TextColumn::make('order')->sortable(),
            ])
            ->defaultSort('order');
        
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }
}