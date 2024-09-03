<?php

namespace App\Filament\Exports;

use App\Models\Members;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class MembersExporter extends Exporter
{
    protected static ?string $model = Members::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user_id'),
            ExportColumn::make('events_id'),
            ExportColumn::make('eventsName'),
            ExportColumn::make('surName'),
            ExportColumn::make('firstName'),
            ExportColumn::make('middleName'),
            ExportColumn::make('birthDate'),
            ExportColumn::make('sex'),
            ExportColumn::make('size'),
            ExportColumn::make('snils'),
            ExportColumn::make('education'),
            ExportColumn::make('contactPhone'),
            ExportColumn::make('email'),
            ExportColumn::make('workPhone'),
            ExportColumn::make('job_title'),
            ExportColumn::make('name_ppo'),
            ExportColumn::make('name_to'),
            ExportColumn::make('region'),
            ExportColumn::make('note'),
            ExportColumn::make('qr_code'),
            ExportColumn::make('qr_code_pic'),
            ExportColumn::make('agreement'),
            ExportColumn::make('confirmation'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your members export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
