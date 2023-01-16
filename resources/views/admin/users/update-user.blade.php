@extends('layouts.pacakge-layout')

@section('title')
    User
@endsection
@section('content')
<aside class="right-side right-padding">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h2>Add User</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Users</a>
            </li>
            <li>
                <a href="add_users.html" class="activated">Update User</a>
            </li>
        </ol>
    </section>
    <!--section ends-->
    <div class="container-fluid">
        <!--main content-->
        <div class="row">
            <div class="col-lg-12">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <i class="fa fa-fw fa-user"></i> Update User
                    </h4>
                        <span class="pull-right">
                            <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                            <i class="glyphicon glyphicon-remove removepanel"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="" action="{{ route('admin.user.update',['id'=>$user->id]) }}" class="form-horizontal" method="POST">
                                    @csrf   
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Image</label>
                                            <div class="col-md-7 text-center">
                                                <div class="input-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img data-src="holder.js/200x150" src="#" alt="profile">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                        <div class="select_align">
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="image">
                                                            </span>
                                                            <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="usr_name">
                                                User Name
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-user-md text-primary"></i>
                                                    </span>
                                                    <input type="text" class="form-control" value="{{ $user->username }}" id="usr_name" placeholder="Username" name="username">
                                                </div>
                                            </div>
                                            @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="mail">
                                                Email
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope text-primary"></i>
                                                    </span>
                                                    <input type="email" value="{{ $user->email }}" placeholder="Email Address" class="form-control" id="mail" name="email" />
                                                </div>
                                            </div>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="contact">
                                                Contact Number
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-phone text-primary"></i>
                                                    </span>
                                                    <input type="text" value="{{ $user->phone_number }}" placeholder="Phone Number" id="contact" class="form-control" name="phone_number" />
                                                </div>
                                            </div>
                                            @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 text-right">
                                                Gender
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <label>
                                                        <input class="radio_val" {{ $user->gender == 'male' ? 'checked':'' }} type="radio" name="gender" value="male" /> Male
                                                    </label>
                                                    <label class="pad-left">
                                                        <input class="radio_val" {{ $user->gender == 'female' ? 'checked':'' }} type="radio" name="gender" value="female" /> Female
                                                    </label>
                                                    <label class="pad-left">
                                                        <input class="radio_val" {{ $user->gender == 'other' ? 'checked':'' }} type="radio" name="gender" value="others" /> Other
                                                    </label>
                                                </div>
                                            </div>
                                            @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="addr">
                                                Address
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-plus text-primary"></i>

                                                    </span>
                                                    <input type="text" class="form-control" value="{{ $user->address }}" id="addr" placeholder="Address" name="address">
                                                </div>
                                            </div>
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="city">
                                                City
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-plus text-primary"></i>
                                                    </span>
                                                    <input type="text" value="{{ $user->city }}" class="form-control" id="city" placeholder="City" name="city">
                                                </div>
                                            </div>
                                            @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="pin">
                                                Pin Code
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                         <i class="fa fa-plus text-primary"></i>
                                                    </span>
                                                    <input type="text" value="{{ $user->pincode }}" class="form-control" placeholder="Pin Code" id="pin" name="pincode">
                                                </div>
                                            </div>
                                            @error('pincode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label  col-md-3" for="select23">Country</label>
                                            <div class="col-md-7">
                                                <select id="select23" value="{{ $user->country }}" name="country" class="form-control js-states select2">
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        <option value>Select a country</option>
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI">Hawaii</option>
                                                    </optgroup>
                                                    <optgroup label="Pacific Time Zone">
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="WA">Washington</option>
                                                    </optgroup>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">
                                                            North Dakota
                                                        </option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">
                                                            Mississippi
                                                        </option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">
                                                            South Dakota
                                                        </option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                    <optgroup label="Eastern Time Zone">
                                                        <option value="CT">
                                                            Connecticut
                                                        </option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">
                                                            Massachusetts
                                                        </option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="NH">
                                                            New Hampshire
                                                        </option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">
                                                            North Carolina
                                                        </option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="PA">
                                                            Pennsylvania
                                                        </option>
                                                        <option value="RI">
                                                            Rhode Island
                                                        </option>
                                                        <option value="SC">
                                                            South Carolina
                                                        </option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WV">
                                                            West Virginia
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="submit" class="btn btn-primary" value="Add"> &nbsp;
                                                <input type="button" class="btn btn-danger" value="Cancel"> &nbsp;
                                                <input type="reset" class="btn btn-default " value="Reset">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- col-md-6 -->
        <!--row -->
        <!--row ends-->
    </div>
    <!-- /.content -->
</aside>
@endsection
