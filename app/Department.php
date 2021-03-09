<?php

namespace App;

use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Department extends Model
{
    use DateMutators,NodeTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'activated',
    ];

    /**
     * Get the user that owns the department.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * dashed title accessor for using admin dropdown
     *
     * @return mixed|string
     */
    public function getDashedTitleAttribute()
    {
        if ($this->attributes['depth'] == 0) {
            return $this->title;
        }
        return str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $this->attributes['depth'] - 1) . " " . $this->title;
    }

    /**
     * Get the "default" left column name.
     *
     * @return string
     */
    public function getDefaultLeftColumnName()
    {
        return 'lft';
    }


    /**
     * Get the "default" right column name.
     *
     * @return string
     */
    public function getDefaultRightColumnName()
    {
        return 'rgt';
    }
}
