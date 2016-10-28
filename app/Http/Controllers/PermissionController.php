<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\PermissionRepository;
use App\Http\Requests\PermissionRequest;

use App\Permission;

class PermissionController extends Controller
{
	protected $permissionRepository;

	public function __construct(PermissionRepository $permissionRepository)
	{
		$this->middleware('auth');
		$this->permissionRepository = $permissionRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = Permission::getAll();
		return view('content.permissions', compact('permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('permission.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PermissionRequest $request)
	{
		$inputs = array_merge($request->all());
		$this->permissionRepository->store($inputs);
		return redirect(route('permissions.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$permission = $this->permissionRepository->getById($id);
		return view('permission.show', compact('permission'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permissions = $this->permissionRepository->getById($id);
		return view('permission.edit', compact('permissions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(PermissionRequest $request, $id)
	{
		$this->permissionRepository->update($id, $request->all());
		return redirect('permissions')->withOk('L\'utilisateur ' . $request->input('id') . ' a été modifié');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->permissionRepository->destroy($id);
		return redirect()->back();
	}

}
?>