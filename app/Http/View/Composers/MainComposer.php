<?php


namespace App\Http\View\Composers;

use App\Menus\SiteMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Morilog\Jalali\jDate;


class MainComposer
{
    protected $currentDate;
    protected $user;
    protected $menus;
    protected $routeName;
    protected $parentRoute;
    protected $parentRouteName;

    public function __construct()
    {
        $this->routeName = Route::currentRouteName();
        if (strpos($this->routeName, 'create') || strpos($this->routeName, 'edit')) {
            $this->parentRoute = route(explode('.', $this->routeName)[0] . '.index');
            $this->parentRouteName = trans('site.' . explode('.', $this->routeName)[0] . '.index');
        }
        $this->user = Auth::user();
        if ($this->user) {
            $this->menus = app(SiteMenu::class)->getMenus($this->user);
        }
        $this->curruntDate = jdate::forge('today')->format('%A, %d %B %y');
    }

    public function compose($view)
    {
        $view->with([
            'user' => $this->user,
            'curruntDate' => $this->curruntDate,
            'menu' => $this->menus,
            'parentRoute' => $this->parentRoute,
            'parentRouteName' => $this->parentRouteName,
            'sectionTitle' => $this->routeName,
        ]);
    }
}
