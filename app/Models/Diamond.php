<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diamond extends Model
{
    use HasFactory;

    protected $fillable = [
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
