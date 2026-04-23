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
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\DateTimePicker;


class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //section 1 - post details
                Section::make("Post Details")
                -> description("Fill in the details of the post")
                // -> icon(Heroicon::RocketLaunch)
                -> icon('heroicon-o-document-text')
                ->schema([
                    //grouping fields into 2 columns
                    Group::make([
                        TextInput::make('title')
                        ->required()
                        ->rules(['min:5'])
                        ->validationMessages([
                            'required' => 'Judul artikel wajib diisi.',
                            'min' => 'Judul harus memiliki panjang minimal 5 karakter.',
                        ]),
                        TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->rules(['min:3'])
                        ->validationMessages([
                            'required' => 'Slug wajib diisi.',
                            'unique' => 'Slug ini sudah ada yang memakai, silakan buat yang lain.',
                            'min' => 'Slug harus terdiri dari minimal 3 karakter.',
                        ]),
                        Select::make('category_id')
                        ->relationship('category', 'name')
                        ->required()
                        ->validationMessages([
                            'required' => 'Kategori artikel wajib dipilih.',
                        ]),
                        ColorPicker::make("color"),
                    ])->columns(2),

                    MarkdownEditor::make("content"),
                ])->columnSpan(2),

                //Grouping fields into 2 columns
                Group::make([

                    //section 2 - image
                    Section::make("Image Upload")
                    ->schema([
                        FileUpload::make('image')
                        ->disk('public')
                        ->directory('posts')
                        ->required()
                        ->validationMessages([
                            'required' => 'Gambar sampul wajib diunggah terlebih dahulu.',
                        ]),
                    ]),

                    //section 3 - meta
                    Section::make("Meta Information")
                        ->schema([
                            TagsInput::make("tags"),
                            Checkbox::make("published"),
                            DateTimePicker::make("published_at"),
                        ]),
                ])->columnSpan(1),

            ])->columns(3);
    }
}
