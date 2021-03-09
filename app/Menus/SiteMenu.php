<?php


namespace App\Menus;


class SiteMenu extends BaseMenu
{
    /**
     * @return array
     */
    protected function getList()
    {
        $list = [
            [
                'title' => trans('site.aside.user'),
                'link' => 'javascript:;',
                'route' => 'users.parent.route',
                'icon' => 'fa fa-users',
                'children' => [
                    [
                        'title' => trans('site.users'),
                        'link' => route('users.index'),
                        'route' => 'users.index',
                        'icon' => 'fa fa-users',
                    ],
                    [
                        'title' => trans('site.roles'),
                        'link' => route('roles.index'),
                        'route' => 'roles.index',
                        'icon' => 'fa fa-folder',
                    ],
                ]
            ],
            [
                'title' => trans('site.departments.index'),
                'link' => route('departments.index'),
                'route' => 'departments.index',
                'icon' => 'fa fa-list-alt',
            ],
        ];
        return $list;
    }

}
