<?php

namespace TomatoPHP\FilamentLocations\Resources\LocationResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use TomatoPHP\FilamentLocations\Resources\LocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class ListLocations extends ManageRecords
{
    protected static string $resource = LocationResource::class;

    public function getTitle(): string
    {
        return trans('filament-locations::messages.location.title');
    }


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(trans('filament-locations::messages.location.create')),
        ];
    }

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->simplePaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
    }
}