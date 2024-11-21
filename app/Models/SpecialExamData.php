<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialExamData extends Model
{
    use HasFactory;
    protected $table = 'special_exam_data'; // Change this if your table name is different

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'user_id',
        'cat_id',
        'question',
        'right_ans',
        'rong_ans',
    ];
}
