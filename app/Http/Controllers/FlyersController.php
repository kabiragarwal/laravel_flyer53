<?php

namespace App\Http\Controllers;

use Auth;
use App\Flyer;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Http\Requests\ChangeFlyerRequest;
//use App\Http\Controllers\Traits\AuthorizesUsers;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FlyersController extends Controller {

   //use AuthorizesUsers;

    public function __construct() {
        $this->middleware('auth', ['except' => ['show']]);
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('flyers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //flash('title','hello world');
        //flash()->overlay('Welcome Aboard','Thank You for signin up.');
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request) {
        $user = Auth::user();

        $flyer = $user->publish(
                new Flyer($request->all())
        );

        // $flyer = $this->user()->publish(
        //         new Flyer($request->all())
        // );
        //Flyer::create($request->all());
        flash()->overlay('Success', 'Your flyer has been created');

        return redirect(flyer_path($flyer));
        //return redirect($flyer->path);
        //return redirect($flyer->zip_code.'/'.$flyer->street);
        //return redirect()->back();
        //dd($request->all());
    }

    public function addPhotos($zip_code, $street, ChangeFlyerRequest $request) {
//        $this->validate($request, [
//            'photo' => 'required|mimes:png,jpg,jpeg,bmp'
//        ]);

        //$flyer = Flyer::locatedAt($zip_code, $street);

//        if($flyer->user_id !== \Auth::id()){
        //if (!$flyer->ownedBy($this->user)) {
//        if(! $this->userCreatedFlyer($request)){
//            return $this->unAuthorized($request);
//        }
        //$photo = Photo::fromForm($request->file('photo'))->store();
        $photo = $this->makePhoto($request->file('photo'));

        //$flyer = Flyer::locatedAt($zip_code, $street)
        Flyer::locatedAt($zip_code, $street)->addphoto($photo);

        //$flyer->addphoto($photo);

        //$flyer->photos()->create(['path'=>"/flyers/photos/{$name}"]);

        return 'Done';
    }




    public function makePhoto(UploadedFile $file) {
        return Photo::named($file->getClientOriginalName())
                        ->move($file);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip_code, $street) {
        //print_r($street);
        //$street = str_replace('-', ' ', $street);
        //dd($street);
        //return Flyer::where(compact('zip_code','street'))->first();
        $flyer = Flyer::locatedAt($zip_code, $street);

        return view('flyers.show', compact('flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
