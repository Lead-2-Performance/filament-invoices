<?php

namespace TomatoPHP\FilamentLocations\Resources\LanguageResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Model;
use TomatoPHP\FilamentLocations\Resources\LanguageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class ListLanguages extends ManageRecords
{
    protected static string $resource = LanguageResource::class;


    public function getTitle(): string
    {
        return trans('filament-locations::messages.languages.title');
    }


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(trans('filament-locations::messages.languages.create'))
        ];
    }

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->simplePaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
    }
}