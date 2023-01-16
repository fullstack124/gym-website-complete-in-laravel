@extends('layouts.pacakge-layout')

@section('title')
    Update News
@endsection
@section('content')
    <aside class="right-side right-padding">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h2>Update News</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">News</a>
                </li>
                <li>
                    <a href="admin_addnews.html">Update News</a>
                </li>
            </ol>
        </section>
        <!--section ends-->
        <div class="container-fluid">
            <!--main content-->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Basic charts strats here-->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-fw fa-file-text-o"></i> Update News
                            </h4>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                <i class="glyphicon glyphicon-remove removepanel"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="add_news_for" enctype="multipart/form-data" method="post"
                                        action="{{ route('admin.new.update', ['id' => $new->id]) }}" class="form-horizontal">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="title" class="col-md-3 control-label">
                                                    Title
                                                    <span class='require'>*</span>
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-fw fa-file-text-o"></i>
                                                        </span>
                                                        <input id="title" type="text" value="{{ $new->title }}"
                                                            name="title" class="form-control fill_it"
                                                            placeholder="Enter Title">
                                                    </div>
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="categry">
                                                    Category
                                                    <span class='require'>*</span>
                                                </label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="category" id="categry">
                                                        <option value>Select Category</option>
                                                        @foreach ($categorys as $category)
                                                            @if ($category->id == $new->cat_id)
                                                                @php
                                                                    $select = 'selected';
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $select = '';
                                                                @endphp
                                                            @endif
                                                            <option {{ $select }} value="{{ $category->id }}">
                                                                {{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Image</label>
                                                <div class="col-md-7 text-center">
                                                    <div class="input-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail"
                                                                style="width: 200px; height: 150px;">
                                                                @if ($new->image)
                                                                    <img src="{{ asset('storage') }}/{{ $new->image }}"
                                                                        alt="profile">
                                                                @else
                                                                    <img data-src="holder.js/200x150" src="#"
                                                                        alt="profile">
                                                                @endif
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                                style="max-width: 200px; max-height: 150px;"></div>
                                                            <div class="select_align">
                                                                <span class="btn btn-primary btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="image">
                                                                </span>
                                                                <a href="#" class="btn btn-primary   fileinput-exists"
                                                                    data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="old_image" value="{{ $new->image }}" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="date">
                                                    Date
                                                    <span class='require'>*</span>
                                                </label>
                                                <div class="col-md-7">
                                                    <div class='input-group date datetimepicker4'>
                                                        <input type='date' value="{{ $new->date }}" class="form-control" name="date"
                                                            id="date" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                    @error('date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Description
                                                    <span class='require'>*</span>
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <textarea id="textarea" class="summernote edi-css form-control fill_it" name="content">{{ $new->content }}</textarea>
                                                    </div>
                                                    @error('content')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="submit" class="mahesh btn btn-primary" value="Update">
                                                    &nbsp;
                                                    <input type="button" class="btn btn-danger" value="Cancel"> &nbsp;
                                                    <input type="reset" id="add-news-reset-editable"
                                                        class="btn btn-default" value="Reset">
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
