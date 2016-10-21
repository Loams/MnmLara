<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Repositories\UsersRepository;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Society;
use App\Law;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller {

	protected $usersRepository;
	
	public function __construct(UsersRepository $usersRepository)
	{
		$this->middleware('auth');
		$this->usersRepository = $usersRepository;
	}
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $users = User::getAll();
	return view('content.users',compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(UsersRequest $request)
  {
	$inputs = array_merge($request->all());
	$this->usersRepository->store($inputs);
	return redirect(route('users.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    	$users = $this->usersRepository->getById($id);
		return view('users.show', compact('users'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
  		$societies = Society::getAll();
		$laws = Law::getAll();
    	$users = $this->usersRepository->getById($id);
		return view('users.edit', compact('users', 'societies', 'laws'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(UsersUpdateRequest $request, $id)
	{
		$user = Auth::user();
		if(isset($request['newpassword']) && $request['newpassword'] != '')
		{
			if(Hash::check($request['oldpassword'], $user->password)){
			$this->usersRepository->updatePassword($id, $request->all());
			return redirect('users')->withOk('L\'utilisateur ' . $request->input('id') . ' a été modifié');
		}
		}
		else
		{
			$this->usersRepository->update($id, $request->all());
			return redirect('users')->withOk('L\'utilisateur ' . $request->input('id') . ' a été modifié');
		}
		
	}

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
	$this->usersRepository->destroy($id);
		return redirect()->back();
  }
  
}

?>