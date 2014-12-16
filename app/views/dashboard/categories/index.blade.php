@extends("dashboard._layouts.layout")

@section('page-head')
    @parent
@stop

@section('content')
    <div class="content-box"><!-- Start Content Box -->
        <div class="content-box-header">
            <h3>Manage Categories</h3>
            <ul class="content-box-tabs">
                <li><a href="#tab1" class="default-tab">Show All</a></li> <!-- href must be unique and match the id of target div -->
                <li><a href="#tab2">Add New</a></li>
            </ul>
            <div class="clear"></div>
        </div> <!-- End .content-box-header -->
        <div class="content-box-content">
            <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
                <table>
                    <thead>
                        <tr>
                           <th><input class="check-all" type="checkbox" /></th>
                           <th>Name</th>
                           <th>Slug</th>
                           <th>Parent Category</th>
                           <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="bulk-actions align-left">
                                    <select name="dropdown">
                                        <option value="option1">Choose an action...</option>
                                        <option value="option2">Edit</option>
                                        <option value="option3">Delete</option>
                                    </select>
                                    <a class="button" href="#">Apply to selected</a>
                                </div>
                                <div class="pagination">
                                    <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
                                    <a href="#" class="number" title="1">1</a>
                                    <a href="#" class="number" title="2">2</a>
                                    <a href="#" class="number current" title="3">3</a>
                                    <a href="#" class="number" title="4">4</a>
                                    <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
                                </div> <!-- End .pagination -->
                                <div class="clear"></div>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td> <a href="{{ route('dashboard.categories.edit',$category->id) }}" title="Edit">{{ $category->name }}</a></td>
                                <td> {{ $category->slug }}</td>
                                <td> {{ isset($category->categories->id) ? $category->categories->name : " - " }}</td>
                                <td>
                                <!-- Icons -->
                                 <a href="{{ route('dashboard.categories.edit',$category->id) }}" title="Edit"><img src="{{ asset("packages/dashboard/resources/images/icons/pencil.png") }}" alt="Edit" /></a>
                                 {{ Form::open(["method"=>"DELETE","route"=>["dashboard.categories.destroy",$category->id], "class"=>"delete"]) }}
                                 <button title="Delete" class="btn-delete"><img src="{{ asset("packages/dashboard/resources/images/icons/cross.png") }}" alt="Delete" /></button>
                                 {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- End #tab1 -->
            <div class="tab-content" id="tab2">
                {{ Form::open(["route"=>"dashboard.categories.store","method"=>"POST",'files'=>true]) }}
                    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                        <p>
                            {{ Form::label("name","Name") }}
                            {{ Form::text("name",$value = "", ["class"=>"text-input large-input"]) }}
                            {{ $errors->first('name','<span class="input-notification error png_bg">:message</span>') }}
                        </p>
                        <p>
                            {{ Form::label("slug","Slug") }}
                            {{ Form::text("slug",$value = "", ["class"=>"text-input large-input"]) }}
                            {{ $errors->first('slug','<span class="input-notification error png_bg">:message</span>') }}
                        </p>
                        <p>
                            {{ Form::label("parent_id","Parent Category") }}
                            {{ Form::select("parent_id",$parents, 0,['class'=>"large-input"]) }}
                        </p>
                        <p>
                            {{ Form::label('thumbnail') }}
                            {{ Form::file('thumbnail',[]) }}
                            {{ $errors->first('thumbnail','<span class="input-notification error png_bg">:message</span>') }}
                        </p>
                        <p>
                            {{ Form::label("meta_title","Meta Title") }}
                            {{ Form::text("meta_title",$value = "", ["class"=>"text-input large-input"]) }}
                            {{ $errors->first('meta_title','<span class="input-notification error png_bg">:message</span>') }}
                        </p>
                        <p>
                            {{ Form::label("meta_description","Meta Description") }}
                            {{ Form::text("meta_description",$value = "", ["class"=>"text-input large-input"]) }}
                            {{ $errors->first('meta_description','<span class="input-notification error png_bg">:message</span>') }}
                        </p>
                        <p>
                            {{ Form::label("meta_keywords","Meta Keywords") }}
                            {{ Form::text("meta_keywords",$value = "", ["class"=>"text-input large-input"]) }}
                            {{ $errors->first('meta_keywords','<span class="input-notification error png_bg">:message</span>') }}
                        </p>
                        <p>
                            {{ Form::submit("Submit",["class"=>"button"]) }}
                        </p>
                    </fieldset>
                    <div class="clear"></div><!-- End .clear -->
                {{ Form::close() }}
            </div> <!-- End #tab2 -->
        </div> <!-- End .content-box-content -->
    </div> <!-- End .content-box -->
@stop