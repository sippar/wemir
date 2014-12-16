@extends("dashboard._layouts.layout")

@section('page-head')
    {{--@parent--}}
@stop

@section('content')
    <div class="content-box"><!-- Start Content Box -->
        <div class="content-box-header">
            <h3>Manage Categories</h3>
            <ul class="content-box-tabs">
                <li><a href="#tab1" class="default-tab">Edit Category</a></li> <!-- href must be unique and match the id of target div -->
                {{--<li><a href="#tab2">Add New</a></li>--}}
            </ul>
            <div class="clear"></div>
        </div> <!-- End .content-box-header -->
        <div class="content-box-content">
            {{ Form::model($category,["method"=>"PUT","route"=>["dashboard.categories.update",$category->id],"files"=>true]) }}
                <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                    <p>
                        {{ Form::label("name","Name") }}
                        {{ Form::text("name",$value = null, ["class"=>"text-input large-input"]) }}
                        {{ $errors->first('name','<span class="input-notification error png_bg">:message</span>') }}
                    </p>
                    <p>
                        {{ Form::label("slug","Slug") }}
                        {{ Form::text("slug",$value = null, ["class"=>"text-input large-input"]) }}
                        {{ $errors->first('slug','<span class="input-notification error png_bg">:message</span>') }}
                    </p>
                    <p>
                        {{ Form::label("parent_id","Parent Category") }}
                        {{ Form::select("parent_id",$parents, $category->parent_id,['class'=>"large-input"]) }}
                    </p>
                    <p>
                        @if(File::exists(public_path($category->thumbnail)))
                            <img src="{{ asset($category->thumbnail) }}" alt=""/>
                        @else
                            <span class="input-notification error png_bg">Error loading image!</span>
                        @endif
                        {{ Form::label('thumbnail') }}
                        {{ Form::file('thumbnail',[]) }}
                        {{ $errors->first('thumbnail','<span class="input-notification error png_bg">:message</span>') }}
                    </p>
                    <p>
                        {{ Form::label("meta_title","Meta Title") }}
                        {{ Form::text("meta_title",$value = null, ["class"=>"text-input large-input"]) }}
                        {{ $errors->first('meta_title','<span class="input-notification error png_bg">:message</span>') }}
                    </p>
                    <p>
                        {{ Form::label("meta_description","Meta Description") }}
                        {{ Form::text("meta_description",$value = null, ["class"=>"text-input large-input"]) }}
                        {{ $errors->first('meta_description','<span class="input-notification error png_bg">:message</span>') }}
                    </p>
                    <p>
                        {{ Form::label("meta_keywords","Meta Keywords") }}
                        {{ Form::text("meta_keywords",$value = null, ["class"=>"text-input large-input"]) }}
                        {{ $errors->first('meta_keywords','<span class="input-notification error png_bg">:message</span>') }}
                    </p>
                    <p>
                        {{ Form::submit("Submit",["class"=>"button"]) }}
                    </p>
                </fieldset>
                <div class="clear"></div><!-- End .clear -->
            {{ Form::close() }}
        </div> <!-- End .content-box-content -->
    </div> <!-- End .content-box -->
@stop