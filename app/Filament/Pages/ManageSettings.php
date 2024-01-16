<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use App\Models\Country;

class ManageSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Brand')
                    ->columns([ 'md' => 2 ])
                    ->description('Provide organization name and other branding details.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Company Name')
                            ->required(),

                        Forms\Components\TextInput::make('slogan')
                            ->label('Slogan')
                            ->nullable(),

                        Forms\Components\FileUpload::make('logo')
                            ->directory('app/uploads/settings')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->nullable(),

                        Forms\Components\FileUpload::make('favicon')
                            ->image()
                            ->imageEditor()
                            ->nullable(),
                    ]),

                Forms\Components\Section::make('Location')
                    ->columns([ 'md' => 2 ])
                    ->description('Provide mailing address for your organization.')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->label('Street Address')
                            ->nullable(),

                        Forms\Components\TextInput::make('city')
                            ->label('City')
                            ->nullable(),

                        Forms\Components\TextInput::make('state')
                            ->label('State')
                            ->nullable(),

                        Forms\Components\TextInput::make('postalCode')
                            ->label('Postal Code')
                            ->nullable(),

                        Forms\Components\Select::make('country')
                            ->label('Country')
                            ->options(function () {
                                return Country::pluck('name', 'id');
                            })
                            ->nullable(),
                    ]),


                Forms\Components\Section::make('Email and Phone')
                    ->columns([ 'md' => 2 ])
                    ->description('Provide email and phone number contacts.')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email Address')
                            ->nullable(),

                        Forms\Components\TextInput::make('phone')
                            ->label('Phone')
                            ->nullable()
                    ]),


                Forms\Components\Section::make('Others')
                    ->columns([ 'md' => 2 ])
                    ->description('')
                    ->schema([
                        Forms\Components\TextInput::make('currency')
                            ->nullable(),
                    ])

            ]);
    }
}
