<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $section = '';
    protected $model;
    /**
     * BaseController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $item = $this->model->findOrFail($id);
        $item->delete();

        return redirect()->route($this->section . '.index');
    }

    /**
     * @param $action
     * @param $item
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectToAction($action, $item)
    {
        switch ($action) {
            case 'SaveAndNew':
                $redirectResponse = Redirect::route($this->section . '.create');
                break;
            case 'SaveAndReload':
                $redirectResponse = Redirect::route($this->section . '.edit', ['id' => $item->id]);
                break;
            default:
                $redirectResponse = Redirect::route($this->section . '.index');
                break;
        }
        return $redirectResponse;
    }
}
