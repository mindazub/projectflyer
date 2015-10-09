<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;
use App\Flyer;


class FlyersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $flyers = Flyer::all();

        // alert()->success('Success Message', 'Optional Title');
        // Alert::message('Robots are working!');
        alert()->success(' Welcome to Flyers index Page! ', 'Welcome!')->autoclose(2000);;
        // \Session::flush();
        // $haha = \Session::all();
        // dd($haha);
        // \Session::forget('sweet_alert');
        

        return view('flyers.index', compact('flyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // alert()->success('You can create Flyer here!', 'Fill in the form!')->autoclose(2000);
        \Session::forget('sweet_alert');
        alert()->success('You can create Flyer here!', 'Fill in the form!')->autoclose(2000);

        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        
        //persist
        $flyer = Flyer::create($request->all());
        //redirect
        // \Session::forget('sweet_alert');
        // alert()->success('Youre Flyer has been created.', 'You created a Flyer!')->autoclose(2000);
        // dd($flyer);
        //
        return redirect()->to('flyers');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        \Session::forget('sweet_alert');
        // alert()->success('You can see the flyer details here!', 'See the flyer details!')->autoclose(2000);

        $flyer =  Flyer::locatedAt($zip, $street);
        // dd($flyer);
        return view('flyers.show', compact('flyer'));
    }

    public function addPhoto(Request $request)
    {
        $file = $request->file('photo');        

        $name = time() . '-' . $file->getClientOriginalName();

        $file->move('images/photos', $name);

        // dd($request->file('photo'));
        return "Done";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
