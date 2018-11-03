<?php

namespace App\Http\Controllers;

use App\Services\CvServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class MyAccountController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        return view('myaccount.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('myaccount.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param CvServices $CvServices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CvServices $CvServices)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => Rule::unique('users')->ignore($user->id),
            'phone' => 'required|max:12|regex:/^(\+)\d{11}/',
            'PESEL' => Rule::unique('users')->ignore($user->id),
            'NIP' => Rule::unique('users')->ignore($user->id),
            'address' => 'required',
            'bio' => 'required',
            'interests' => 'required',
            'skills' => 'required',
            'experience' => 'required',
            'birth_date' => 'required|date',
            'cv' => 'sometimes|required|file|mimetypes:application/pdf|max:2048'
        ]);

        try{
            if (isset($validated['cv'])){
                $fileName = $CvServices->processCvName($request->file('cv'));
                $location = 'cv/'.$validated['PESEL'];
                $request->file('cv')->storeAS($location, $fileName);
                $validated['cv'] = $fileName;
                Storage::delete('cv/'.$user->PESEL.'/'.$user->cv);
            }
            $user->update($validated);
            Session::flash('success', 'Profil został zaaktualizowany');
            return redirect()->route('myaccount.show');
        }catch(\Exception $e){
            return back()->withErrors(['error'=>$e->getMessage()]);
        }

    }
}
