<?php


namespace App\Menus;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class BaseMenu
{
    public function getMenus($user)
    {
        $list = collect($this->getList());
        if (!isset($user)) {
            $user = Auth::user();
        }
        $rendered = '';

        foreach ($list as $parent => $rootItem) {
            if (isset($rootItem['children'])) {
                foreach ($rootItem['children'] as $index => $child) {
                    $permission = substr_replace($child['route'], '.*', strrpos($child['route'], '.'));
                    if ($user) {
                        if (!$user->can($permission)) {
                            unset($rootItem['children'][$index]);
                        }
                    }
                }
                if (count($rootItem['children'])) {
                    $rendered .= $this->renderMenu($rootItem)[0];
                }
            } else {
                $permission = substr_replace($rootItem['route'], '.*', strrpos($rootItem['route'], '.'));
                if ($user->can($permission)) {
                    $rendered .= $this->renderMenu($rootItem)[0];
                }
            }
        }

        return $rendered;
    }

    private function renderMenu($node)
    {
        $routeName = Route::currentRouteName();
        $childrenRendered = '';
        $childrenIsOpen = false;
        $isOpen = false;

        if (isset($node['children'])) {
            $childrenRendered .= '<ul>';
            foreach ($node['children'] as $child) {
                list($childRendered, $childIsOpen) = $this->renderMenu($child);
                $childrenRendered .= $childRendered;

                $childrenIsOpen = ($childIsOpen || $childrenIsOpen);
            }
            $childrenRendered .= '</ul>';
        }

        $nodeRoute = substr_replace($node['route'], '.*', strrpos($node['route'], '.'));
        $currentRoute = substr_replace($routeName, '.*', strrpos($routeName, '.'));

        if ($currentRoute == $nodeRoute) {
            $isOpen = true;
        } else {
            $isOpen = false;
        }

        $rendered = '';
        $rendered .= '<li '. (($isOpen || $childrenIsOpen) ? 'class="open"' : '') . '>';
        $rendered .= '<a href="' . $node['link'] . '" class="' . (($isOpen) ? ' active' : '') . '">';
        $rendered .= (isset($node['icon']) ? ' <i class="nav-link-icon ' . $node['icon'] . '"></i>' : '');
        $rendered .= '<span>' . $node['title'] . '</span>';
        $rendered .= '</a>';
        $rendered .= $childrenRendered . '</li>';
        return [$rendered, $isOpen];
    }
}
