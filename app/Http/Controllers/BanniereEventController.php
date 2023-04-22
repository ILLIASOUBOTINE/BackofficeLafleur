<?php

namespace App\Http\Controllers;

use App\Models\BanniereEvent;
use Illuminate\Http\Request;

class BanniereEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $banniereEvents = BanniereEvent::all();
       return view('banniere_event.index',['banniereEvents'=>$banniereEvents]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BanniereEvent  $banniereEvent
     * @return \Illuminate\Http\Response
     */
    public function show(BanniereEvent $banniereEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BanniereEvent  $banniereEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(BanniereEvent $banniereEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BanniereEvent  $banniereEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BanniereEvent $banniereEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BanniereEvent  $banniereEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(BanniereEvent $banniereEvent)
    {
        //
    }
}