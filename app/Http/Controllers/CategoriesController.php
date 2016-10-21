<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\CategoriesRepository;
use App\Http\Requests\CategoriesRequest;

use App\Categories;

class CategoriesController extends Controller {

	protected $categoriesRepository;
	
	public function __construct(CategoriesRepository $categoriesRepository)
	{
		$this->middleware('auth');
		$this->categoriesRepository = $categoriesRepository;
	}
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $categories = Categories::getAll();
	return view('content.categories',compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('categories.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CategoriesRequest $request)
  {
	$inputs = array_merge($request->all());
	$this->categoriesRepository->store($inputs);
	return redirect(route('categories.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    	$category = $this->categoriesRepository->getById($id);
		return view('categories.show', compact('category'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    	$category = $this->categoriesRepository->getById($id);
		return view('categories.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(CategoriesRequest $request, $id)
	{
		$this->categoriesRepository->update($id, $request->all());
		return redirect('categories')->withOk('L\'utilisateur ' . $request->input('id') . ' a été modifié');
	}

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
	$this->categoriesRepository->destroy($id);
		return redirect()->back();
  }
  
}

?>