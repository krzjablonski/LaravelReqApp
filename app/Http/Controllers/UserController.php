<?php

namespace App\Http\Controllers;

use App\Role;
use App\Services\CvServices;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereRoleIs('candidate')->orderby('created_at', 'desc')->paginate(10);
        return view('admin.candidates.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidates.create-update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param CvServices $CvServices
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CvServices $CvServices)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^(\+)\d{11}/',
            'PESEL' => 'required|integer|unique:users',
            'NIP' => 'required|integer|unique:users',
            'address' => 'required',
            'bio' => 'required',
            'interests' => 'required',
            'skills' => 'required',
            'experience' => 'required',
            'birth_date' => 'required|date',
            'assessment' => 'required|integer|digits_between:1,10',
            'password' => 'required|min:6|confirmed',
            'cv' => 'sometimes|required|file|mimetypes:application/pdf|max:2048'
        ]);

        try{
            $fileName = $CvServices->processCvName($request->file('cv'));
            $user = User::create([
                'name' => $validated['name'],
                'surname' => $validated['surname'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'PESEL' => $validated['PESEL'],
                'NIP' => $validated['NIP'],
                'address' => $validated['address'],
                'bio' => $validated['bio'],
                'interests' => $validated['interests'],
                'skills' => $validated['skills'],
                'experience' => $validated['experience'],
                'birth_date' => $validated['birth_date'],
                'assessment' => $validated['assessment'],
                'password' => Hash::make($validated['password']),
                'cv' => $fileName,
            ]);
            $user->attachRole(Role::where('name', 'candidate')->first());
            $location = 'cv/'.$validated['PESEL'];
            $request->file('cv')->storeAS($location, $fileName);
            Session::flash('success', 'Dodano kandydata');
            return redirect()->route('candidates.index');
        }catch (\Exception $e){
            return back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param User $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(User $candidate)
    {
        $cv = Storage::url('cv/'.$candidate->PESEL.'/'.$candidate->cv);
        return view('admin.candidates.show')->withUser($candidate)->withCv($cv);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(User $candidate)
    {
        return view('admin.candidates.create-update')->withUser($candidate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $candidate
     * @param CvServices $CvServices
     * @return void
     */
    public function update(Request $request, User $candidate, CvServices $CvServices)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => Rule::unique('users')->ignore($candidate->id),
            'phone' => 'required|max:12|regex:/^(\+)\d{11}/',
            'PESEL' => Rule::unique('users')->ignore($candidate->id),
            'NIP' => Rule::unique('users')->ignore($candidate->id),
            'address' => 'required',
            'bio' => 'required',
            'interests' => 'required',
            'skills' => 'required',
            'experience' => 'required',
            'birth_date' => 'required|date',
            'assessment' => 'required|integer|digits_between:1,10',
            'cv' => 'sometimes|required|file|mimetypes:application/pdf|max:2048'
        ]);

        try{
            if (isset($validated['cv'])){
                $fileName = $CvServices->processCvName($request->file('cv'));
                $location = 'cv/'.$validated['PESEL'];
                $request->file('cv')->storeAS($location, $fileName);
                $validated['cv'] = $fileName;
                Storage::delete('cv/'.$candidate->PESEL.'/'.$candidate->cv);
            }
            $candidate->update($validated);
            Session::flash('success', 'Zaaktualizowano kandydata');
            return redirect()->route('candidates.index');
        }catch(\Exception $e){
            return back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $candidate)
    {
        try{
            $candidate->detachRoles($candidate->roles);
            $candidate->delete();
            Session::flash('success', 'Usunięto kandydata');
            return redirect()->route('candidates.index');
        }catch (\Exception $e){
            return back()->withErrors(['error'=>$e->getMessage()]);
        }


    }
}
