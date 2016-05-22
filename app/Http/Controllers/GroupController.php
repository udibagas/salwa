<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GroupRequest;
use App\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('group.index', [
			'groups' => Group::when($request->group_name, function($query) use ($request) {
							return $query->where('group_name', 'like', '%'.$request->group_name.'%');
						})->when($request->description, function($query) use ($request) {
							return $query->where('description', 'like', '%'.$request->description.'%');
						})->when($request->type, function($query) use ($request) {
							return $query->where('type', $request->type);
						})->orderBy('group_name', 'ASC')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create', ['group' => new Group]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $data 				= $request->all();
		$data['group_code'] = str_slug($request->group_name);
		$data['user_id']	= auth()->user()->user_id;
		$data['createdby']	= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_group', $fileName);

            $data['img_group'] = 'uploads/dirimg_group/'.$fileName;

        }

		Group::create($data);

		return redirect('/group')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('group.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, Group $group)
    {
		$data 				= $request->all();
		$data['group_code'] = str_slug($request->group_name);
		$data['updatedby']	= auth()->user()->name;

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_group', $fileName);

            $data['img_group'] = 'uploads/dirimg_group/'.$fileName;

        }

		$group->update($data);

		return redirect('/group')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
		// if (count($group->forums) || count($group->artikels)
		// || count($group->informasis) || count($group->hadists)
		// || count($group->pedulis) || count($group->produks))

		if (count($group->forums) || count($group->artikels)
		|| count($group->informasis) || count($group->hadists)
		|| count($group->audios) || count($group->murottals)
		|| count($group->pedulis) || count($group->pertanyaans)
		|| count($group->kitabs) || count($group->produks)
		|| count($group->images) || count($group->promos))
		{
			return redirect('/group')->with('error', 'Group gagal dihapus karena digunakan');
		}

        $group->delete();
		return redirect('/group')->with('success', 'Data berhasil dihapus');
    }
}
