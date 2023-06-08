<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Client::orderBy('created_at', 'ASC')->get();
        return view('client.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $validated = $request->validated();
        $data = $request->only([ 'customer_id', 'first_name', 'last_name', 'gender', 'age', 'email', 'mobile_number', 'address', 'blood_group']);
        $data['customer_id'] = 'MD-PT-' . rand(1000, 9999);
        Client::create($data);

        flash('Client added successfully.', 'success');
        return redirect()->route('client.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($client_id)
    {
        $client = Client::find($client_id);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request)
    {
        $validated = $request->validated();
        $data = $request->only(['first_name', 'last_name', 'gender', 'age', 'email', 'mobile_number', 'address', 'blood_group']);
        Client::find($request->id)->update($data);

        flash('Client updated successfully.', 'success');
        return redirect()->route('client.index');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id){
        $client = Client::find($id);
        $client->status = ($client->status == 1) ? 0 : 1;
        $client->update();
        flash('Client status updated successfully.', 'success');
        return redirect()->route('client.index');
    }
}
