<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = str_replace(' ', '%', $request->search);

        return view('user.index', [
			'users' => User::orderBy('user_name', 'ASC')
						->when($request->user_name, function($query) use ($request) {
							return $query->where('user_name', 'like', '%'.$request->user_name.'%');
						})->when($request->name, function($query) use ($request) {
							return $query->where('name', 'like', '%'.$request->name.'%');
						})->when($request->email, function($query) use ($request) {
							return $query->where('email', 'like', '%'.$request->email.'%');
						})->when($request->jenis_kelamin, function($query) use ($request) {
							return $query->where('jenis_kelamin', $request->jenis_kelamin);
						})->when($request->active, function($query) use ($request) {
							return $query->where('active', $request->active);
						})->when($request->user_status, function($query) use ($request) {
							return $query->where('user_status', $request->user_status);
						})->paginate()
		]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

	public function me()
	{
		return view('user.profile', ['user' => auth()->user()]);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
		$data['profile'] = clean($request->profile);

		if ($request->password) {
			$data['password']	= bcrypt($request->password);
			$data['confirm']	= $request->password;
		} else {
			unset($data['password']);
		}

		if ($request->hasFile('img'))
		{
			$file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_user', $fileName);

            $data['img_user'] = 'uploads/dirimg_user/'.$fileName;

			if ($user->img_user && file_exists($user->img_user)) {
				unlink($user->img_user);
			}
		}

		$user->update($data);

		if (auth()->user()->user_id == $user->user_id) {
			return redirect('/me')->with('success', 'Data berhasil disimpan');
		} else {
			return redirect('/user')->with('success', 'Data berhasil disimpan');
		}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
		$user->delete();

		if ($user->img_user && file_exists($user->img_user)) {
			unlink($user->img_user);
		}

		return redirect($request->redirect)->with('success', 'Data berhasil dihapus');
    }
}
