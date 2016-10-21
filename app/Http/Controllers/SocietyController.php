<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\SocietiesRepository;
use App\Http\Requests\SocietiesRequest;

use App\Society; 

class SocietyController extends Controller {

	protected $societiesRepository;
	
	public function __construct(SocietiesRepository $societiesRepository)
	{
		$this->middleware('auth');
		$this->societiesRepository = $societiesRepository;
	}
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $societies = Society::getAll();
	return view('content.societies',compact('societies'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('societies.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(SocietiesRequest $request)
  {
    $inputs = array_merge($request->all());
	$this->societiesRepository->store($inputs);
	return redirect(route('societies.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    	$society = $this->societiesRepository->getById($id);
		return view('societies.show', compact('society'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    	$society = $this->societiesRepository->getById($id);
		return view('societies.edit', compact('society'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(SocietiesRequest $request, $id)
	{
		$this->societiesRepository->update($id, $request->all());
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
	$this->societiesRepository->destroy($id);
		return redirect()->back();
  }
  
  static public function getAll(){
  	return App\Society::all();
  }
}

?>