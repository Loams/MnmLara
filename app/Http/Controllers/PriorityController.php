<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\PriorityRepository;
use App\Http\Requests\PriorityRequest;

use App\Priority;

class PriorityController extends Controller
{
	protected $priorityRepository;

	public function __construct(PriorityRepository $priorityRepository)
	{
		$this->middleware('auth');
		$this->priorityRepository = $priorityRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$priorities = Priority::getAll();
		return view('content.priorities', compact('priorities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('priorities.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PriorityRequest $request)
	{
		$inputs = array_merge($request->all());
		$this->priorityRepository->store($inputs);
		return redirect(route('priorities.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$priority = $this->priorityRepository->getById($id);
		return view('priorities.show', compact('priority'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$priority = $this->priorityRepository->getById($id);
		return view('priorities.edit', compact('priority'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(PriorityRequest $request, $id)
	{
		$this->priorityRepository->update($id, $request->all());
		return redirect('priorities')->withOk('L\'utilisateur ' . $request->input('id') . ' a été modifié');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->priorityRepository->destroy($id);
		return redirect()->back();
	}

}
?>