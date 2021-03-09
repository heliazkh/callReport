<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('first_name', 'LIKE', "%$name%")
                ->orWhere('last_name', 'LIKE', "%$name%");
        });
    }

    public function mobile($mobile)
    {
        return $this->where('mobile', 'LIKE', "$mobile%");
    }

    public function username($username)
    {
        return $this->where('username', 'LIKE', "%$username%");
    }

    public function department($id)
    {
        return $this->where('department_id', $id);
    }

    /*public function activated($activated)
    {
        return $this->where('username', 'LIKE', "%$username%");
    }*/

    public function roleList($id)
    {
        return $this->whereHas('roles', function($query) use ($id)
        {
            return $query->where('id', $id);
        });
    }
}
