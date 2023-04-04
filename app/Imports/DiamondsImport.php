<?php

namespace App\Imports;

use App\Models\Diamond;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class DiamondsImport implements ToModel, WithHeadingRow, WithUpserts, WithBatchInserts, WithChunkReading, ShouldQueue, WithValidation
{
    use RemembersRowNumber, Importable;

    public function uniqueBy()
    {
        return 'index';
    }

    public function rules(): array
    {
        return [
            'index' => ['required', 'integer'],
            'cut' => ['required', 'string'],
            'color' => ['required', 'string'],
            'clarity' => ['required', 'string'],
            'carat_weight' =>  ['required', 'numeric'],
            'cut_quality' => ['required', 'string'],
            'lab' => ['required', 'string'],
            'symmetry' => ['required', 'string'],
            'polish' => ['required', 'string'],
            'eye_clean' => ['required', 'string'],
            'culet_size' => ['required', 'string'],
            'culet_condition' => ['required', 'string'],
            'depth_percent' => ['required', 'numeric'],
            'table_percent' => ['required', 'numeric'],
            'meas_length' => ['required', 'numeric'],
            'meas_width' => ['required', 'numeric'],
            'meas_depth' => ['required', 'numeric'],
            'girdle_min' => ['required', 'string'],
            'girdle_max' => ['required', 'string'],
            'fluor_color' => ['required', 'string'],
            'fluor_intensity' => ['required', 'string'],
            'fancy_color_dominant_color' => ['required', 'string'],
            'fancy_color_secondary_color' => ['required', 'string'],
            'fancy_color_overtone' => ['required', 'string'],
            'fancy_color_intensity' => ['required', 'string'],
            'total_sales_price' => ['required', 'numeric'],
        ];
    }

    public function model(array $row)
    {
        $currentRowNumber = $this->getRowNumber();

        return new Diamond([
            'index' => $row['index'],
            'cut' => $row['cut'],
            'color' => $row['color'],
            'clarity' => $row['clarity'],
            'carat_weight' => $row['carat_weight'],
            'cut_quality' => $row['cut_quality'],
            'lab' => $row['lab'],
            'symmetry' => $row['symmetry'],
            'polish' => $row['polish'],
            'eye_clean' => $row['eye_clean'],
            'culet_size' => $row['culet_size'],
            'culet_condition' => $row['culet_condition'],
            'depth_percent' => $row['depth_percent'],
            'table_percent' => $row['table_percent'],
            'meas_length' => $row['meas_length'],
            'meas_width' => $row['meas_width'],
            'meas_depth' => $row['meas_depth'],
            'girdle_min' => $row['girdle_min'],
            'girdle_max' => $row['girdle_max'],
            'fluor_color' => $row['fluor_color'],
            'fluor_intensity' => $row['fluor_intensity'],
            'fancy_color_dominant_color' => $row['fancy_color_dominant_color'],
            'fancy_color_secondary_color' => $row['fancy_color_secondary_color'],
            'fancy_color_overtone' => $row['fancy_color_overtone'],
            'fancy_color_intensity' => $row['fancy_color_intensity'],
            'total_sales_price' => $row['total_sales_price']
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
