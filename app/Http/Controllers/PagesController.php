<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class PagesController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        return view('pages.index');
    }

}
