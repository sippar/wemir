<?php

class Category extends  Eloquent
{
    public  $fillable = ['parent_id','name','slug','thumbnail','meta_title','meta_description','meta_keywords'];

    public function categories()
    {
        return $this->belongsTo('Category','parent_id');
    }
}