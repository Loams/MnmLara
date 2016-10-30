<?php

namespace App\Http\Controllers;
use App\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\RoleRepository;
use App\Http\Requests\RoleRequest;

use App\Role;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->middleware('auth');
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::getAll();
        return view('content.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $inputs = array_merge($request->all());
        $this->roleRepository->store($inputs);
        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->getById($id);
        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $roles = $this->roleRepository->getById($id);
        return view('role.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->roleRepository->update($id, $request->all());
        return redirect('roles')->withOk('L\'utilisateur ' . $request->input('id') . ' a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->roleRepository->destroy($id);
        return redirect()->back();
    }
    
    public function editPermission($id)
    {
        $permissions = Permission::getAll();
        $role = $this->roleRepository->getById($id);
        return view('content.rolepermission', compact('role', 'permissions'));
    }
    
    public function updatePermission(Request $request, $id)
    {
        $attach = array();
        $role = $this->roleRepository->getById($id);
        foreach($request->all() as $perm_id => $value)
        {
            $firstKey = substr($perm_id, 0, 1);
            //echo "premiere lettre : " . $firstKey . " key : " . $key . " value : " . $value ."<br>";
            if($firstKey != '_'){
                echo( "id : " . $perm_id . " value : " . $value . "<br>");
                if($value == 'on')
                {
                    $attach[] = $perm_id;
                }
            }


        }
        $role->permission()->sync($attach);
        return redirect()->back();
    }

}
?>