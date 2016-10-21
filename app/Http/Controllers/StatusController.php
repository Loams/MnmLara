<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\StatusRepository;
use App\Http\Requests\StatusRequest;

use App\Status;

class StatusController extends Controller
{
	protected $statusRepository;

	public function __construct(StatusRepository $statusRepository)
	{
		$this->middleware('auth');
		$this->statusRepository = $statusRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$statuses = Status::getAll();
		return view('content.status', compact('statuses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('status.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StatusRequest $request)
	{
		$inputs = array_merge($request->all());
		$this->statusRepository->store($inputs);
		return redirect(route('status.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$status = $this->statusRepository->getById($id);
		return view('status.show', compact('status'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$status = $this->statusRepository->getById($id);
		return view('status.edit', compact('status'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(StatusRequest $request, $id)
	{
		$this->statusRepository->update($id, $request->all());
		return redirect('status')->withOk('L\'utilisateur ' . $request->input('id') . ' a été modifié');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->statusRepository->destroy($id);
		return redirect()->back();
	}

}
?>