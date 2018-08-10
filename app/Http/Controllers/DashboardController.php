<?php
/**
 * Created by PhpStorm.
 * User: tuantruong
 * Date: 7/16/18
 * Time: 3:27 PM
 */

namespace App\Http\Controllers;


use App\MyCore\Routing\MyController;

class DashboardController extends MyController
{
    public function getIndex() {
        return view("dashboard.index");
    }
}