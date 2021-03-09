<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
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
     * Get the permissions that owns the role.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Get the users that owns the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * permission list accessor
     *
     * @return mixed
     */
    public function getPermissionListAttribute()
    {
        return $this->permissions->pluck('id')->toArray();
    }

    /**
     * show permissions accessor
     *
     * @return mixed
     */
    public function getShowPermissionsAttribute()
    {
        $permissions = $this->permissions()->pluck('name', 'id')->toArray();

        return implode(' , ', $permissions);
    }

    /**
     * Big block of caching of permissions functionality.
     *
     * @return mixed
     */
    public function cachedPermissions()
    {
        $rolePrimaryKey = $this->primaryKey;
        $cacheKey = 'entrust_permissions_for_role_' . $this->$rolePrimaryKey;

        return Cache::rememberForever($cacheKey, function () {
            return $this->perms()->get();
        });
    }
}
