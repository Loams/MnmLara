<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\LawRepository;
use App\Http\Requests\LawRequest;

use App\Law;

class LawsController extends Controller
{
	protected $lawRepository;

	public function __construct(LawRepository $lawRepository)
	{
		$this->middleware('auth');
		$this->lawRepository = $lawRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$laws = Law::getAll();
		return view('content.laws', compact('laws'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('law.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LawRequest $request)
	{
		$inputs = array_merge($request->all());
		$this->lawRepository->store($inputs);
		return redirect(route('laws.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$law = $this->lawRepository->getById($id);
		return view('law.show', compact('law'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$laws = $this->lawRepository->getById($id);
		return view('law.edit', compact('laws'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(LawRequest $request, $id)
	{
		$this->lawRepository->update($id, $request->all());
		return redirect('laws')->withOk('L\'utilisateur ' . $request->input('id') . ' a été modifié');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->lawRepository->destroy($id);
		return redirect()->back();
	}

}
?>