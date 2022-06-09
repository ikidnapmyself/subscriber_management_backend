<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subscriber_id)
    {
        $fields = Field::where('subscriber_id',$subscriber_id)->get();

        $response = ([
            'data' => $fields,
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
    public function store($subscriber_id,Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type'  => 'required',
        ]);

        $field = Field::create([
            'subscriber_id' => $subscriber_id,
            'title' => $request->title,
            'type' => $request->type,
        ]);

        $response = ([
            'data' => $field,
            'message' => 'record created'
        ]);

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show($subscriber_id,Field $field)
    {
        if($subscriber_id != $field->subscriber_id)
        {
            return redirect(404);
        }
        $response = ([
            'data' => $field,
            'message' => 'record found',
        ]);

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update($subscriber_id,Request $request, Field $field)
    {
        if($subscriber_id != $field->subscriber_id)
        {
            return redirect(404);
        }

        $request->validate([
            'title' => 'required',
            'type'  => 'required',
        ]);

        $field->update($request->all());

        $response = ([
            'data' => $field,
            'message' => 'record updated'
        ]);

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy($subscriber_id,Field $field)
    {
        if($subscriber_id != $field->subscriber_id)
        {
            return redirect(404);
        }

        $field->delete();

        $response = ([
            'data' => $field,
            'message' => 'record updated',
        ]);

        return response()->json($response);
    }
}
