<?php

namespace App\Http\Controllers;

use App\Traits\ApiXp;

class BankController extends Controller
{
    use ApiXp;

    /**
     * User Account balance
     *
     * Format return to consume in Application, in this point the app check user expenses and incoming to suggest
     * new investments. The AI algorithm will be implemented ASAP.
     * @return \Illuminate\Http\JsonResponse
     */
    public function myBalance()
    {
        $info = $this->getUserInfo();
        $output = [];
        foreach($info->banks as $bank) {
            $output[] = [
                'id' => $bank->institution->bankId,
                'name' => $bank->institution->bankName,
                'balance' => $bank->checking->balance,
                'limit' => $bank->checking->limit,
                'color' => 'black',
                'historic' => $bank->creditCard->transactions
            ];
        }
        return response()->json($output);
    }

    /**
     * Credit Card Transactions
     *
     * List of credit card transactions
     * @return \Illuminate\Http\JsonResponse
     */
    public function creditCardTransactions()
    {
        return response()->json($this->getCreditCardTransactions());
    }

    /**
     * User investments
     *
     * The user investment wallet
     * @return \Illuminate\Http\JsonResponse
     */
    public function investiments()
    {
        return response()->json($this->getInvestiments());
    }

    /**
     * User Checking Account
     *
     * List of account transactions
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkingAccount()
    {
        return response()->json($this->getCheckingAccount());
    }

}
