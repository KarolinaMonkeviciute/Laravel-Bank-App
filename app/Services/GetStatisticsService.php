<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Account;
use NumberFormatter;

class GetStatisticsService
{
   static public function getClientsCount(): ?int{
        return Client::count();
    }

    static public function getAccountsCount(): ?int{
        return Account::count();
    }

    static public function getWholeAmmount(): ?int{
        return Account::sum('balance');
    }

    static public function getBiggestAmount(): ?int{
        return Account::max('balance');
    }

    static public function getAverageBalance(): ?string{
        return number_format(Account::avg('balance'), 2); ;
    }

    static public function getZeroBalanceAccountsCount(): ?int{
        return Account::where('balance', 0)->count();
    }

    static public function getNegativeBalanceAccountsCount(): ?int{
        return Account::where('balance', '<', 0)->count();
    }
}
