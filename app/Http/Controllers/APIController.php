<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormUser as Form;
class APIController extends Controller
{
    //

    public function __construct(Form $userform) {
        $this->userform = $userform;
        $this->totalPosts = 100;
    }
    public function formlists() {
        try {

            $findAll = Form::orderBy('id', 'desc')->paginate($this->totalPosts);
            return response()->json(['status' => 200, 'totalCount' => $findAll->count(), 'datas' => $findAll->items(), 'message' => 'Your current data lists'], 200);
        } catch(Exception $e) {
            return response()->json(['status' => 500, 'error' => $e, 'message' => 'Something went wrong'], 200);
        }
    }
}
