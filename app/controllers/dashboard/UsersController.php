<?php namespace App\Controllers\Dashboard;

use Wemir\Exceptions\ValidationException;
use Wemir\Repositories\UsersRepository;
use Wemir\Validation\UsersValidator as Validator;
use Wemir\Handlers\DataHandler;
use DashboardController;
use Input;
use View;
use Redirect;

class UsersController extends DashboardController
{

    private  $filesPath = 'packages/img/users';

    function __construct(UsersRepository $repository,Validator $validator, DataHandler $dataHandler)
    {
        $this->repository  = $repository;
        $this->validator   = $validator;
        $this->dataHandler = $dataHandler;
    }

    /**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = $this->repository->paginate();
		return View::make('dashboard.users.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('dashboard.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
        try {
            $this->validator->validateForCreate($data = Input::all());
            $data = array_add($this->dataHandler->handle($data),'activated',true);
            $this->repository->create($data);
        }
        catch(ValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        catch(\Exception $e){
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }

        return Redirect::route('dashboard.users.index');
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = $this->repository->find($id);
		return View::make('dashboard.users.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try {

            $this->validator->validateForUpdate($data = Input::all(),$id);
            $data = $this->dataHandler->handle($data);
            $this->repository->update($id,$data);
        }
        catch(ValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        catch(\Exception $e){
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }

        return Redirect::route('dashboard.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->repository->destroy($id);
	    return Redirect::route('dashboard.users.index');
    }
}