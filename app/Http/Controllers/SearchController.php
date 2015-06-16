<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function getUsername(Requests\UsernameSearch $request)
    {
        $data = instagram()->searchUser($request->input('username'), 1);

        if (empty($data->data)) {
            return response()->json(['Error' => 'No user found with that username!'], 422);
        }

        $id = $data->data[0]->id;
        $username = $data->data[0]->username;

        // reason for this check is because Instagram username search doesn't return
        // an exact match. It returns an exact match if it finds one, but if not
        // it will return the next closest match so we must explicitly check this.
        if ($username != $request->input('username')) {
            return response()->json(['Error' => 'No user found with that username!'], 422);
        }

        $getUserData = instagram()->getUserMedia($id, 9);

        if (empty($getUserData->data)) {
            return response()->json(['Error' => 'User has no photos!'], 422);
        }

        return response()->json($getUserData->data, 200);
    }
}
