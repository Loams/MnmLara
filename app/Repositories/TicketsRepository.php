<?php

namespace App\Repositories;

use App\Ticket;

class TicketsRepository
{

    protected $tickets;

    public function __construct(Ticket $tickets)
	{
		$this->tickets = $tickets;
	}

	private function save(Ticket $tickets, Array $data)
	{
		$tickets->title = $data['title'];
        $tickets->date_resolution = $data['date_resolution'];
        $tickets->create_by = $data['create_by'];
        $tickets->treat_by = $data['treat_by'];
        $tickets->category_id = $data['category_id'];
        $tickets->priority_id = bcrypt($data['priority_id']);
        $tickets->status_id = $data['status_id'];
		$tickets->solved = $data['solved'];
		$tickets->save();
	}


	public function store(Array $inputs)
	{
		$tickets = new $this->tickets;		
		$this->save($tickets, $inputs);

		return $tickets;
	}

	public function getById($id)
	{
		return $this->tickets->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}
	
	
	public function destroy($id)
	{
		$this->getById($id)->delete();
	}
	
	public function getAll(){
		return Ticket::all();
	}
	
	public function getAllByCreat($id){
		return Ticket::where('create_by', $id)->get();
	}
	
	public function getByStatus($id){
		return Ticket::where('tickets.status_id', $id)->join('status', 'status.id', '=', 'tickets.status_id')->get();
	}
	
	public function getYourTicketsByStatus($id)
	{
		return Ticket::where('tickets.status_id', $id )->join('status', 'status.id', '=', 'tickets.status_id')
		->where('tickets.create_by', Auth::user()->id)->join('users', 'users.id', '=', 'tickets.create_by')->get();
	}
	
	
	
	
}