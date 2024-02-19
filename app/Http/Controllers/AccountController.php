<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Client;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Http\Request;
use App\Services\GenerateAccountNumber;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $clients = Client::all();
        $clientId = (int) $request->query('client_id', 0);
        $account_number = GenerateAccountNumber::generateNumber();

        return view('accounts.create', [
            'clients' => $clients,
            'clientId' => $clientId,
            'account_number' => $account_number,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        Account::create($request->all());

        return redirect()->route('clients-index')->with('ok', 'Sėkmingai pridėta nauja sąskaita');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editAmount(Client $client, Account $account, $action)
    {
        $client = $account->client;

        if($action === 'add'){
            return view('accounts.addAmount', 
            [
            'account' => $account,
            'client' => $client,
        ]);} elseif($action === 'withdraw'){
            return view('accounts.withdrawAmount', 
            [
            'account' => $account,
            'client' => $client,
        ]);
        }
        
    }

    public function amountUpdate(UpdateAccountRequest $request, Account $account, $action){

        $amount = $request->input('amount');
        if($action === 'add'){
            $newBalance = (int) $account->balance + $amount;
        }elseif($action === 'withdraw'){
            if(!($account->balance > 0) || ($amount > $account->balance)){
            return redirect()->route('clients-index')->with('info', 'Pasirinkta per didelė suma nuskaičiavimui');
            }
            $newBalance = (int) $account->balance - $amount;
        } else {
            return redirect()->route('clients-index')->with('info', 'Neegzistuojanti operacija');
        }

        $account->update(['balance' => $newBalance]);
        return redirect()->route('clients-index')->with('ok', 'Sąskaitos likutis sėkmingai pakeistas');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Account $account){
        return view('accounts.delete', [
            'account' => $account,
        ]);
    }
    public function destroy(Account $account)
    {
        if($account->balance == 0.00){
           $account->delete(); 
           return redirect()->route('clients-index')->with('info', 'Sąskaita sėkmingai ištrinta');
        }
        
        return redirect()->route('clients-index')->with('info', 'Ištrinti galima tik sąskaitas, kurių likutis 0 Eur');
    }

    public function transfer()
    {
        $accounts = Account::all();
        $clients = Client::all();

        return view('accounts.transactions', [
            'accounts' => $accounts,
            'clients' => $clients,
        ]);
    }

    public function transferUpdate(Request $request){
        $withdrawFromId = $request->input('toWithdraw');
        $addToId = $request->input('toAdd'); 
        $amount = $request->input('amount');
        $withdrawFromAccount = Account::findOrFail($withdrawFromId);
        $addToAccount = Account::findOrFail($addToId);

        if($withdrawFromAccount->balance < 0 || $withdrawFromAccount->balance < $amount){
            return redirect()->route('clients-index')->with('info', 'Pasirinkta per didelė suma pervedimui');
        }
        $withdrawFromAccount->balance -= $amount;
        $addToAccount->balance += $amount;

        $withdrawFromAccount->save();
        $addToAccount->save();

        return redirect()->route('clients-index')->with('ok', 'Sėkmingai įvykdytas lėšų pervedimas');
    }

    public function taxes(){
        $clients = Client::all();

        foreach($clients as $client){
            if($client->accounts->isEmpty()){
               continue;
            }
            $account = $client->accounts()->first();
            $balance = $account->balance;
            $newBalance = $balance - 5;
            $account->update(['balance' => $newBalance]);
        }
        return redirect()->route('clients-index')->with('ok', 'Mokesčiai nuskaičiuoti');
    }
}
