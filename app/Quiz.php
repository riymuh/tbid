<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'id', 'participant', 'site_id', 'study_id', 'country_id', 'country', 'document', 'remark', 'quiz_completion',
    ];
    protected $table = 'quiz';
}
