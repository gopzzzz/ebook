<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;
use App\Models\OrderMaster;
use DB;

class HomeController extends Controller
{
public function index()
{
    $total_revenue=DB::table('order_masters')->sum('total_amount');
    $total_count=DB::table('order_masters')->count();
    

$currentYearRevenue = OrderMaster::whereYear('created_at', date('Y'))
    ->sum('total_amount');

$lastYearRevenue = OrderMaster::whereYear('created_at', date('Y') - 1)
    ->sum('total_amount');

$growthPercentage = $lastYearRevenue > 0
    ? round((($currentYearRevenue - $lastYearRevenue) / $lastYearRevenue) * 100, 2)
    : 100;

    $monthlyRevenue = [];

for ($i = 1; $i <= 12; $i++) {
    $monthlyRevenue[] = OrderMaster::whereYear('created_at', date('Y'))
        ->whereMonth('created_at', $i)
        ->sum('total_amount');
}

$totalOrders = OrderMaster::count();

$categoryStats = DB::table('types')
    ->leftJoin('items', 'types.id', '=', 'items.item_type')
    ->select(
        'types.id',
        'types.name',
        DB::raw('COUNT(items.id) as total_products')
    )
    ->groupBy('types.id', 'types.name')
    ->orderByDesc('total_products')
    ->get();

    return view('dashboard', compact('total_revenue','total_count',
    'currentYearRevenue',
    'lastYearRevenue',
    'growthPercentage','monthlyRevenue', 'totalOrders',
    'categoryStats'));
}

}
