<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')
            ->except([
                'create',
                'authenticate',
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
        return response()->json(['status' => 1, 'data' => $users], 200);
    }
    /**
     * To authenticate.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $data = $request->json();
        $rules = array(
            'email' => 'required',
            'password' => 'required',
        );
        $customMessages = [
            'required' => 'The :attribute field is required.',
        ];
        $validator = Validator::make($data->all(), $rules, $customMessages);

        if ($validator->fails()) {
            $err = array();
            foreach ($validator->errors()->toArray() as $error) {
                foreach ($error as $sub_error) {
                    array_push($err, $sub_error);
                }
            }
            return response()->json(['status' => 0, 'errors' => $err], 200);
        } else {
            $credential = ['email' => $data->get('email'), 'password' => $data->get('password')];
            if (!Auth::attempt($credential)) {
                return response()->json(['error' => 'UnAuthorized'], 401);
            } else {
                $user = User::where('email', trim($data->get('email')))->first();
                $token = $user->createToken('personal access token')->plainTextToken;
                return response()->json(['token' => $token], 200);
            }
        }

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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
