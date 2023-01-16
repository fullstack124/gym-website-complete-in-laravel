@extends('layouts.pacakge-layout')

@section('title')
    Add Faq
@endsection
@section('content')
    <aside class="right-side right-padding">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h2>Add Faq</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">FAQ</a>
                </li>
                <li>
                    <a href="add_faq.html" class="activated">Add Faq</a>
                </li>
            </ol>
        </section>
        <!--section ends-->
        <div class="container-fluid">
            <!--main content-->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Basic charts strats here-->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-fw fa-question-circle"></i> Add Faq
                            </h4>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                <i class="glyphicon glyphicon-remove removepanel"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="add_faq_for" action="{{ route('admin.faq.store') }}" method="post"
                                        role="form" class="form-horizontal">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="title">
                                                Title
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-file-text-o"></i>
                                                    </span>
                                                    <input type="text" name="title" id="title"
                                                        class="form-control text1" placeholder="Enter Title">
                                                </div>
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="selct">
                                                Category
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control text2" id="selct" name="category">
                                                    <option value>Select Category</option>
                                                    @foreach ($categorys as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="col-md-3 control-label" for="activate">
                                                Tags
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <select class="tags_options form-control" id="activate" multiple="multiple"
                                                    name="tags">
                                                </select>
                                            </div>
                                            @error('tags')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">
                                                Description
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <textarea name="content" class="summernote edi-css form-control"></textarea>
                                            </div>
                                            @error('content')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class=" form-group">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-primary" value="Add">Add</button>
                                                <input type="button" class="btn btn-danger cancel-button-margins"
                                                    value="Cancel" />
                                                <input type="reset" class="btn btn-default reset-button-margins"
                                                    value="Reset" />
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

@section('script')
@endsection
