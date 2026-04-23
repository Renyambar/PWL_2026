<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Product Tabs')
                // ->vertical() // Latihan 3: Mengubah tampilan menjadi vertical
                ->tabs([
                    // Tab 1: Product Info
                    Tabs\Tab::make('Product Info')
                        // ->icon('heroicon-o-academic-cap') // Latihan 4: Icon berbeda
                        ->schema([
                            TextEntry::make('name')
                                ->label('Product Name')
                                ->weight('bold')
                                ->color('primary'),
                            TextEntry::make('sku')
                                ->label('SKU')
                                ->badge()
                                ->color('success'),
                            TextEntry::make('description')
                                ->label('Description'),
                        ]),

                    // Tab 2: Pricing & Stock
                    Tabs\Tab::make('Pricing & Stock')
                        // ->icon('heroicon-o-currency-dollar') // Latihan 4: Icon berbeda
                        // Latihan 1 & 2: Badge dinamis berdasarkan stock dan warna yang berbeda
                        ->badge(fn ($record) => $record->stock)
                        ->badgeColor(fn ($record) => $record->stock < 10 ? 'danger' : 'info')
                        ->schema([
                            TextEntry::make('price')
                                ->label('Price')
                                ->icon('heroicon-o-currency-dollar')
                                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                            TextEntry::make('stock')
                                ->label('Stock'),
                        ]),

                    // Tab 3: Media & Status
                    Tabs\Tab::make('Media & Status')
                        // ->icon('heroicon-o-photo') // Latihan 4: Icon berbeda
                        ->schema([
                            ImageEntry::make('image')
                                ->label('Product Image')
                                ->disk('public'),
                            IconEntry::make('is_active')
                                ->label('Active')
                                ->boolean(),
                            IconEntry::make('is_featured')
                                ->label('Featured')
                                ->boolean(),
                        ]),
                ])->columnSpanFull(),

                Section::make('Product Info')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Product Name')
                            ->weight('bold')
                            ->color('primary'),
                        TextEntry::make('id')
                            ->label('Product ID'),
                        TextEntry::make('sku')
                            ->label('Product SKU')
                            ->badge()
                            ->color('warning'),
                        TextEntry::make('description')
                            ->label('Product Description'),
                    ]),

                Section::make('Pricing & Stock')
                    ->schema([
                        TextEntry::make('price')
                            ->label('Product Price')
                            ->icon('heroicon-o-currency-dollar')
                            ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                        TextEntry::make('stock')
                            ->label('Product Stock')
                            ->icon('heroicon-o-cube'),
                    ]),

                Section::make('Media & Status')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Product Image')
                            ->disk('public'),
                        IconEntry::make('is_active')
                            ->label('Is Active')
                            ->boolean(),
                        IconEntry::make('is_featured')
                            ->label('Is Featured')
                            ->boolean(),
                        TextEntry::make('created_at')
                            ->label('Product Creation Date')
                            ->date('d M Y')
                            ->color('info'),
                    ]),
            ]);
    }
}
