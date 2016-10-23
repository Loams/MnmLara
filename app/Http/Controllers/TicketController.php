<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\TicketsRepository;
use App\Http\Requests\TicketsRequest;
use Illuminate\Support\Facades\Auth;


class TicketController extends Controller
{

	protected $ticketsRepository;

	public function __construct(TicketsRepository $ticketsRepository)
	{
		$this->middleware('auth');
		$this->ticketsRepository = $ticketsRepository;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$tickets = $this->ticketsRepository->getAll();
		return view('content.tickets', compact('tickets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tickets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TicketsRequest $request)
	{
		$inputs = array_merge($request->all());
		$this->ticketsRepository->store($inputs);
		return redirect(route('tickets.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ticket = $this->ticketsRepository->getById($id);
		return view('tickets.show', compact('ticket'));
	}

	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ticket = $this->ticketsRepository->getById($id);
		return view('tickets.edit', compact('ticket'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(TicketsRequest $request, $id)
	{
		$this->ticketsRepository->update($id, $request->all());
		return redirect('socieites')->withOk('L\'utilisateur ' . $request->input('id') . ' a été modifié');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->ticketsRepository->destroy($id);
		return redirect()->back();
	}

	public function showAllYourTicket($id)
	{
		$tickets = $this->ticketsRepository->getAllByCreat($id);
		return view('content.tickets', compact('tickets'));
	}
	
	/**
	 * Display a listing of the resource sort by status
	 *
	 * @param  int  $status
	 * @return Response
	 */
	public function showTicketsByStatus($status)
	{
		$tickets = $this->ticketsRepository->getByStatus($status);
		return view('content.tickets', compact('tickets'));
	}

	/**
	 * Display a listing of the resource sort by status
	 *
	 * @param  int  $status
	 * @param  int  $id
	 * @return Response
	 */
	public function showYourTicketsByStatus($status, $id)
	{
		
		$tickets = $this->ticketsRepository->getYourTicketByCreat($id, $status);
		
		return view('content.tickets', compact('tickets'));
	}

}
?>