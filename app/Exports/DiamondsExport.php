<?php

namespace App\Exports;

use App\Models\Diamond;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Throwable;

class DiamondsExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function headings(): array
    {
        return [
            'index',
            'cut',
            'color',
            'clarity',
            'carat_weight',
            'cut_quality',
            'lab',
            'symmetry',
            'polish',
            'eye_clean',
            'culet_size',
            'culet_condition',
            'depth_percent',
            'table_percent',
            'meas_length',
            'meas_width',
            'meas_depth',
            'girdle_min',
            'girdle_max',
            'fluor_color',
            'fluor_intensity',
            'fancy_color_dominant_color',
            'fancy_color_secondary_color',
            'fancy_color_overtone',
            'fancy_color_intensity',
            'total_sales_price'
        ];
    }

    public function map($diamond): array
    {
        return [
            $diamond->index,
            $diamond->cut,
            $diamond->color,
            $diamond->clarity,
            $diamond->carat_weight,
            $diamond->cut_quality,
            $diamond->lab,
            $diamond->symmetry,
            $diamond->polish,
            $diamond->eye_clean,
            $diamond->culet_size,
            $diamond->culet_condition,
            $diamond->depth_percent,
            $diamond->table_percent,
            $diamond->meas_length,
            $diamond->meas_width,
            $diamond->meas_depth,
            $diamond->girdle_min,
            $diamond->girdle_max,
            $diamond->fluor_color,
            $diamond->fluor_intensity,
            $diamond->fancy_color_dominant_color,
            $diamond->fancy_color_secondary_color,
            $diamond->fancy_color_overtone,
            $diamond->fancy_color_intensity,
            $diamond->total_sales_price
        ];
    }

    public function failed(Throwable $exception): void
    {
        // handle failed export
    }

    public function query()
    {
        return Diamond::query();
    }
}
