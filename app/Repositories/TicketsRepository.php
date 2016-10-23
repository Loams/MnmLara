<?php

namespace App\Repositories;

use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

		return Ticket::select('tickets.id as id' , 'title', 'date_resolution', 'create_by', 'treat_by', 'category_id', 'priority_id', 'status_id', 'open', 'solved', 'tickets.created_at', 'tickets.updated_at')
			->where('tickets.status_id', $id)
			->join('status', 'status.id', '=', 'tickets.status_id')
			->get();
	}

	public function getYourTicketByCreat($id, $status){



		$tickets = Ticket::select('tickets.id as id' , 'title', 'date_resolution', 'create_by', 'treat_by', 'category_id', 'priority_id', 'status_id', 'open', 'solved', 'tickets.created_at', 'tickets.updated_at')->where('tickets.status_id', $status)
							->join('status', 'status.id', '=', 'tickets.status_id');
		if(Auth::user()->law->name === 'Superuser' || Auth::user()->law->name === 'Modérateur' )
		{
			$tickets = $tickets->where('tickets.treat_by','=', $id);
		}
		else
		{
			$tickets = $tickets->where('tickets.create_by','=', $id);
		}
			$tickets = $tickets->join('users', 'users.id', '=', 'tickets.create_by')
				->get();

		return $tickets;
		/*Ticket::select('tickets.id as id' , 'title', 'date_resolution', 'create_by', 'treat_by', 'category_id', 'priority_id', 'status_id', 'open', 'solved', 'tickets.created_at', 'tickets.updated_at')->where('tickets.status_id', $status)
			->join('status', 'status.id', '=', 'tickets.status_id')
			->where('tickets.create_by','=', $id)
			->join('users', 'users.id', '=', 'tickets.create_by')
			->get();
		*/
	}
	
	
	
	
}