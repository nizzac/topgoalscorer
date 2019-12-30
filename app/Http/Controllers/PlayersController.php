<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SavePlayerRequest;

class PlayersController extends Controller
{
    /**
     *
     * Accepts post data to create a Player
     * @return string
     *
     */
    public function create(SavePlayerRequest $request)
    {
        try {
            $request->save();
            return response()->json(['success' => ucwords($request->name) . ' has been created successfully']);
        } catch (Exception $exception) {
            return response()->json(['error', $exception->message()]);
        }
    }
}
