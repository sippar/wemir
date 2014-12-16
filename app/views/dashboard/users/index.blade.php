@extends("dashboard._layouts.layout")

@section('page-head')
    @parent
@stop

@section('content')
    <div class="content-box"><!-- Start Content Box -->
        <div class="content-box-header">
            <h3>Manage Users</h3>
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
                           <th>Email</th>
                           <th>Last Login In</th>
                           <th>Activated</th>
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
                        @foreach($users as $user)
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td> <a href="{{ route('dashboard.users.edit',$user->id) }}" title="Edit">{{ $user->email }}</a></td>
                                <td> {{ $user->last_login }}</td>
                                <td> {{ $user->activated ? "YES" : " NO " }}</td>
                                <td>
                                <!-- Icons -->
                                 <a href="{{ route('dashboard.users.edit',$user->id) }}" title="Edit"><img src="{{ asset("packages/dashboard/resources/images/icons/pencil.png") }}" alt="Edit" /></a>
                                 {{ Form::open(["method"=>"DELETE","route"=>["dashboard.users.destroy",$user->id], "class"=>"delete"]) }}
                                 <button title="Delete" class="btn-delete"><img src="{{ asset("packages/dashboard/resources/images/icons/cross.png") }}" alt="Delete" /></button>
                                 {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- End #tab1 -->
            <div class="tab-content" id="tab2">
                {{ Form::open(["method"=>"POST","route"=>"dashboard.users.store","files"=>false]) }}
                   <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                       <p>
                           {{ Form::label("email","E-mail") }}
                           {{ Form::email("email",$value = null, ["class"=>"text-input  large-input"]) }}
                          {{ $errors->first('email','<span class="input-notification error png_bg">:message</span>') }}
                       </p>
                       <p>
                           {{ Form::label("password","Password") }}
                           {{ Form::password("password", ["class"=>"text-input  large-input"]) }}
                           {{ $errors->first('password','<span class="input-notification error png_bg">:message</span>') }}

                       </p>
                       <p>
                           {{ Form::label("password_confirm","Password Confirm ") }}
                           {{ Form::password("password_confirm", ["class"=>"text-input large-input"]) }}
                           {{ $errors->first('password_confirm','<span class="input-notification error png_bg">:message</span>') }}

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