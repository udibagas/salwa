<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
						->when($search, function($query) use ($search) {
							return $query->where('user_name', 'like', '%'.$search.'%')
										->orWhere('name', 'like', '%'.$search.'%')
										->orWhere('email', 'like', '%'.$search.'%');
						})->when(str_contains($search, 'ustadz'), function($query) {
							return $query->where('user_status', User::ROLE_USTADZ);
						})->when($search == 'admin', function($query) {
							return $query->orWhere('user_status', User::ROLE_ADMIN);
						})->when($search == 'member', function($query) {
							return $query->orWhere('user_status', User::ROLE_MEMBER);
						})->when($search == 'aktualita', function($query) {
							return $query->orWhere('user_status', User::ROLE_AKTUALITA);
						})->when($search == 'staff', function($query) {
							return $query->orWhere('user_status', User::ROLE_STAFF);
						})->when($search == 'active', function($query) {
							return $query->orWhere('active', 'Y');
						})->when($search == 'nonactive', function($query) {
							return $query->orWhere('active', 'N');
						})->when($search == 'pria', function($query) {
							return $query->orWhere('jenis_kelamin', 'p');
						})->when($search == 'wanita', function($query) {
							return $query->orWhere('jenis_kelamin', 'w');
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
    public function update(Request $request, $id)
    {
        $data = $request->all();

		if ($request->has('img'))
		{
			$file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_user', $fileName);

            $data['img_user'] = 'uploads/dirimg_user/'.$fileName;
		}

		$user->update($data);
		return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
		$user->delete();
		return redirect('/user');
    }
}
