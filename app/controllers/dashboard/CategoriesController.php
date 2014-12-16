<?php namespace App\Controllers\Dashboard;

use DashboardController;
use Wemir\Exceptions\ValidationException;
use Wemir\Repositories\CategoriesRepository;
use Wemir\Validation\CategoriesValidator as Validator;
use Wemir\Handlers\DataHandler;
use View;
use Redirect;
use Input;
use Request;

class CategoriesController  extends DashboardController
{
    private  $filesPath = 'packages/img/categories';

    function __construct(CategoriesRepository $repository,Validator $validator, DataHandler $dataHandler)
    {
        $this->repository  = $repository;
        $this->validator   = $validator;
        $this->dataHandler = $dataHandler;
    }

    /**
     * Display a listing of rubrics
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->repository->paginate();
        $parents    = $this->repository->getParents(0);
        return View::make('dashboard.categories.index',compact('categories','parents'));
        /*
            ->withCategories($this->repository->paginate())
            ->withParents($this->repository->getParents(0));
        */
    }

    /**
     * Show the form for creating a new rubric
     *
     * @return Response
     */
    public function create()
    {
        $parents = $this->repository->getParents(0);

        return View::make('dashboard.categories.create',compact('parents'));
    }

    /**
     * Store a newly created rubric in storage.
     *
     * @return Response
     */
    public function store()
    {
        try{
            $this->validator->validateForCreate($data = Input::all());

            $data = $this->dataHandler->handle($data,$this->filesPath);

            $this->repository->create($data);
        }
        catch(ValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        catch(\Exception $e){
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }

        return Redirect::route('dashboard.categories.index');
    }

    /**
     * Display the specified rubric.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified rubric.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->repository->find($id);
        $parents = $this->repository->getParents($id);
        return View::make('dashboard.categories.edit', compact('category','parents'));
    }

    /**
     * Update the specified rubric in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        try{
            $this->validator->validateForUpdate($data = Input::all(),$id);
            $data = $this->dataHandler->handle($data,$this->filesPath);
            $this->repository->update($id,$data);
        }
        catch (ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        catch(\Exception $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }

        return Redirect::route('dashboard.categories.index');
    }
    /**
     * Remove the specified rubric from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
        return Redirect::route('dashboard.categories.index');
    }
}