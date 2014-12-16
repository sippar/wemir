<?php namespace Wemir\Repositories;

abstract class DbRepository
{
    /**
     * @var
     */
    protected $model;

    /**
     * How many items per page
     * @var
     */
    protected $howMany = 20;

    /**
     * Get all items
     * @return mixed
     */
    public function all(){

        return $this->model->orderBy('id','DESC')->get();
    }

    /**
     * @return mixed
     */
    public function paginate(){

        return $this->model->orderBy('id','DESC')->paginate($this->howMany);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id){
        return $this->model->find($id);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function lists(array $params = []){
        return $this->lists($params);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
         $model = $this->find($id);

        return $model->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id) {
        return $this->model->destroy($id);
    }
}