<?php

namespace App\Http\Controllers\Traits;

use App\Flyer;
use Illuminate\Http\Request;

trait AuthorizesUsers {

    protected function userCreatedFlyer(Request $request) {
        return Flyer::where([
                    'street' => $request->street,
                    'zip_code' => $request->zip_code,
                    'user_id' => $this->user->id,
                ])->exists();
    }

    protected function unAuthorized(Request $request) {
        if ($request->ajax()) {
            return response(['message' => 'No Way.'], 403);
        }

        flash('No Way.');

        return redirect('/');
    }   
}