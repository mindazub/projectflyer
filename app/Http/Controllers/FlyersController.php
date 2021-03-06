<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Auth;




class FlyersController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);

        // parent::__construct();
    }
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
        //
        $user_id = \Auth::user()->id;

        $flyer = Flyer::create($request->all(), $user_id);
        // dd($flyer);
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

    public function addPhotoContr($zip, $street, Request $request)
    {
        $this->validate($request, [
            // damn it - mimes not mime
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
            ]);

        $flyer = Flyer::locatedAt($zip, $street);

        // GUARD is HERE
        // 
        if(! $flyer->ownedBy(\Auth::user()))
        // if(! $flyer->ownedBy($this->user))
        {
           return $this->unauthorized($request);
        }


        $photo = $this->makePhoto($request->file('photo'));


        $flyer->addPhoto($photo);

        
    }

    protected function unauthorized(Request $request)
    {
         if($request->ajax())
         {
                return response(['message' => 'No way, you are not the owner of this flyer.'], 403);
         }

            return redirect('/');
    }

    protected function makePhoto(UploadedFile $file)
    {
           // return Photo::fromForm($file)->store($file);
           return Photo::named($file->getClientOriginalName())
                  ->move($file);
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
    public function destroy($zip, $street)
    {
        $flyer =  Flyer::locatedAt($zip, $street);

    }
}
