<?php namespace Wemir\Repositories;

use Wemir\Exceptions\ValidationException;
use File;

class CategoriesRepository extends  DbRepository
{
    public function __construct(\Category $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
       return $this->model/*->where('parent_id',0)*/->with('categories')->get();
    }

    public function getParents($id)
    {
        $parents = $this->model->where('parent_id',0)
            ->where("id","<>",$id)
            ->lists('name','id');

        return array_add($parents,0,"Uncategorised");
    }
    public function update($id, array $data)
    {
        if($data['parent_id'] !== "0")
        {
            $childCategories = $this->model->where('parent_id',$id)->get();
            if(count($childCategories)) throw new ValidationException('You can not set the parent category, until this category has child elements');
        }

        return parent::update($id,$data);
    }

    public function destroy($id)
    {
        $category = $this->find($id);

        $categories = $this->model->where('parent_id',$id)->get();

        foreach($categories as $category)
        {
            $this->update($category->id,["parent_id"=>0]);
        }

        if(File::exists(public_path($category->thumbnail))) {
            File::delete(public_path($category->thumbnail));
        }
        return parent::destroy($id);
    }
}