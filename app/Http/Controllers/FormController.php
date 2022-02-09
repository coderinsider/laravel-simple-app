<?php

namespace App\Http\Controllers;

use App\Models\FormUser;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(FormUser $formUser) {
        $this->formUser = $formUser;
    }
    public function index()
    {
        //
        $data = [];
        $data['page_title'] = "User Form";
        $data['current_page'] = 'userform';
        return view('public.form.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        if($req->isMethod('post')) {
            try {
                $dataCreate = $this->formUser->create($req->input('saveRecords'));
                if($dataCreate) {
                    return response()->json(['status' => 200, 'message' => 'Create record successfully', 'data' => $dataCreate ], 200);
                }
            } catch(Exception $e) {
                return response()->json(['status' => 500, 'message' => $e], 200);
            }
            
        }
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
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
