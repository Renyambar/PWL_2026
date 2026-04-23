<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                // Section::make('Post Details')->schema([
                TextInput::make('title')->required(),
                TextInput::make('slug')->required(),
                Select::make('category_id')
                ->label('Category')
                ->options(
                \App\Models\Category::all()->pluck('name', 'id')
                )
                ->required(),
                MarkdownEditor::make('body'),
                // ]),
                ColorPicker::make('color'),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('post'),
                TagsInput::make('tags'),
                Checkbox::make('published'),
                DatePicker::make('published_at'),
            ])->columns(3);
    }
}
