<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;


class Permission extends EntrustPermission
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    /**
     * Get the roles that owns the permission.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * prefix accessor
     *
     * @return string
     */
    public function getPrefixAttribute()
    {
        $nameArr = explode('.', $this->name);
        array_pop($nameArr);
        return implode('.', $nameArr);
    }
}
