<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $user = Auth::user('admin');
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(new HtmlString("<h1 style='text-align: center;margin-top: 50px;'>{$user->name}-welcome to 萝卜教学系统</h1>"));
//            ->row(Dashboard::title())
//            ->row(function (Row $row) {

//                $row->column(12, function (Column $column) {});
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::environment());
//                });
//
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::extensions());
//                });
//
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::dependencies());
//                });
//            });
    }
}
