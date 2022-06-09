<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriber = Subscriber::all();
        $response = ([
            'data' => $subscriber,
            'message' => 'records found',
        ]);

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:subscribers',
            'state' => 'required'
        ]);

        $subscriber = Subscriber::create([
            'name' => $request->name,
            'email' => $request->email,
            'state' => $request->state
        ]);

        $response = ([
            'data' => $subscriber,
            'message' => 'record created',
        ]);
        
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        $response = ([
            'data' => $subscriber,
            'message' => 'record found',
        ]);

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|exists:subscribers',
            'state' => 'required'
        ]);

        $subscriber->name = $request->name;
        $subscriber->email = $request->email;
        $subscriber->state = $request->state;

        $subscriber->save();

        $response = ([
            'data' => $subscriber,
            'message' => 'record updated'
        ]);

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->fields()->delete();
        $subscriber->delete();

        $response = ([
            'data' => Subscriber::all(),
            'message' => 'record deleted'
        ]);

        return response()->json($response);
    }
}
