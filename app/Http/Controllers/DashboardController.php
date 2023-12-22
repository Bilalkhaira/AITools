<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Tool;
use App\Models\User;
use App\Models\Notification;
use App\Models\SellerRequest;
use App\Models\ContactRequest;

class DashboardController extends Controller
{
    public function index()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        $users = User::latest()->limit(5)->get();
        $usersCount = count(User::get());

        $tools = Tool::latest()->limit(5)->get();
        $toolsCount = count(Tool::get());


        return view('pages.dashboards.index', compact('usersCount', 'users', 'tools', 'toolsCount'));
    }
}
