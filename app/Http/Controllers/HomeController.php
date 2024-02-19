<?php

namespace App\Http\Controllers;

use App\Services\GetStatisticsService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientsCount = GetStatisticsService::getClientsCount();
        $accountsCount = GetStatisticsService::getAccountsCount();
        $ammountInBank = GetStatisticsService::getWholeAmmount();
        $biggestAmount = GetStatisticsService::getBiggestAmount();
        $averageBalance = GetStatisticsService::getAverageBalance();
        $zeroBalanceAccouts = GetStatisticsService::getZeroBalanceAccountsCount();
        $negativeBalanceAccounts = GetStatisticsService::getNegativeBalanceAccountsCount();

        return view('home', [
            'clientsCount' => $clientsCount,
            'accountsCount' => $accountsCount,
            'ammountInBank' => $ammountInBank,
            'biggestAmount' => $biggestAmount,
            'averageBalance' => $averageBalance,
            'zeroBalanceAccouts' => $zeroBalanceAccouts,
            'negativeBalanceAccounts' => $negativeBalanceAccounts,
        ]);
    }
}
