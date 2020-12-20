<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_title',
        'keywords',
        'project_category',
        'description',
        'location',
        'budget',
        'more_contents',
        'funding_agency',
        'author',
        'created_by_id',
        'status_of_completion',
        'project_start',
        'project_end',
        'file_attachment_path',
    ];
}
