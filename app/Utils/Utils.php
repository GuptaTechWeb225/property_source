<?php

namespace App\Utils;

use App\Enums\DealType;
use App\Models\Account;
use App\Models\Property\Transaction;

class Utils
{
    public static function permissions(): Array
    {
        $permissionsPath = __DIR__ . '/permissions.php';
        return include($permissionsPath);
    }


    public static function accountbalanceAdjustment($account_id)
    {
        $creditAmount = Transaction::where('account_id', $account_id)->where('type', 'credit')->sum('amount');
        $debitAmount = Transaction::where('account_id', $account_id)->where('type', 'debit')->sum('amount');

        $balance = $creditAmount - $debitAmount;

        Account::where('id', $account_id)->update(['balance' => $balance]);
    }


    public static function advertisementTypes()
    {
        return [
            DealType::RENT => 'Rent',
            DealType::SELL => 'Sell',
            DealType::MORTGAGE => 'Mortgage',
            DealType::LEASE => 'Lease',
            DealType::CARETAKER => 'Caretaker',
        ];
    }
}
