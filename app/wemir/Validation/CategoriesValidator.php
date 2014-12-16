<?php namespace Wemir\Validation;

class CategoriesValidator extends  Validator
{
    public function rulesCreate()
    {
        return [
            'parent_id'        =>'integer',
            'name'             => 'required|unique:categories',
            'slug'             => 'unique:categories|alpha_dash',
            'thumbnail'        => 'required|image',
            'meta_title'       => '',
            'meta_description' => '',
            'meta_keywords'    => ''
        ];
    }

    public function rulesUpdate($id)
    {
        return [
            'parent_id'        =>'integer',
            'name'             => 'required|unique:categories,name,'.$id,
            'slug'             => 'alpha_dash|unique:categories,slug,'.$id,
            'thumbnail'        => 'image|mimes:jpeg,bmp,png,jpg,gif',
            'meta_title'       => '',
            'meta_description' => '',
            'meta_keywords'    => ''
        ];
    }
}
