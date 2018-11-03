<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ErrorResource|UserResourceCollection
     */
    public function index()
    {
        $users = User::whereRoleIs('candidate')->orderby('created_at', 'desc')->get();

        if (!$users){
            return new ErrorResource(collect(['error'=>'Brak użytkowników w bazie']));
        }

        return new UserResourceCollection($users);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return ErrorResource|UserResource
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user){
            return new ErrorResource(collect(['error'=>'Użytkownik z tym ID nie istnieje']));
        }
        return new UserResource($user);
    }
}
