<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sorts = Client::getSorts();
        $sortBy = $request->query('sort', '');
        $clients = Client::query();

        $clients = match($sortBy) {
            'name_asc' => $clients->orderBy('surname')->paginate(10),
            'name_desc' => $clients->orderByDesc('surname')->paginate(10),
            'balance_asc' => $clients->withSum('accounts', 'balance')->orderBy('accounts_sum_balance')->paginate(10),
            'balance_desc' => $clients->withSum('accounts', 'balance')->orderByDesc('accounts_sum_balance')->paginate(10),
            'zero_accounts' => $clients->whereDoesntHave('accounts')->paginate(10),
            default => $clients->paginate(10),
        };

        return view('clients.index', [
            'clients' => $clients,
            'sorts' => $sorts,
            'sortBy' => $sortBy,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->all());

        return redirect()->route('clients-index')->with('ok', 'Sėkmingai pridėtas naujas klientas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client, Account $account)
    {
        $accounts = Account::where('client_id', $client->id)->get();
        $totalBalance = 0;
        foreach ($accounts as $account) {
            $totalBalance += $account->balance;
        }

        return view('clients.show', [
            'accounts' => $accounts,
            'client' => $client,
            'totalBalance' => $totalBalance
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit',[
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('clients-index')->with('ok', 'Sėkmingai pakeista kliento informacija');
    }

    public function delete(Client $client){
        return view('clients.delete', [
            'client' => $client,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $clientAccounts = Account::where('client_id', $client->id)->get();
        foreach($clientAccounts as $account){
            if($account->balance != 0){
                return redirect()->route('clients-index')->with('info', 'Ištrinti galima tik tuos klientus, kurių visų sąskaitų likutis 0 Eur');
            }
        }
        $client->delete();

        return redirect()->route('clients-index')->with('ok', 'Sėkmingai ištrintas klientas');
    }
}