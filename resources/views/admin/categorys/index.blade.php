@extends('layouts.pacakge-layout')

@section('title')
    Categorys
@endsection
@section('content')
    <aside class="right-side right-padding">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h2>Categorys</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="active" id="active">
                    <a href="packages.html">Categorys</a>
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
                                <i class="fa fa-money"></i> Add Categorys
                            </h4>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                <i class="glyphicon glyphicon-remove removepanel"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="packages" method="POST" action="{{ route('admin.category.create') }}"
                                        class="form-horizontal">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="title">
                                                    Category Name
                                                    <span class='require'>*</span>
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-fw fa-file-text-o"></i>
                                                        </span>
                                                        <input type="text" name="category_name" id="title"
                                                            class="form-control" placeholder="Enter Title">

                                                    </div>

                                                </div>
                                                @error('category_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="form-group">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="submit" class="btn btn-primary" value="Add">
                                                    <input type="button" class="btn btn-danger" value="Cancel">
                                                    <input type="reset" ID="add-news-reset-editable"
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
            <div class="row">
                <div class="col-lg-12">
                    <!-- Basic charts strats here-->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-fw fa-file-text-o"></i> Present Categorys
                            </h4>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                <i class="glyphicon glyphicon-remove removepanel"></i>
                            </span>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-bordered table1">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Edit/Save</th>
                                        <th>Cancel/Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categorys as $category)
                                        <tr>
                                            <td>{{ $category->category_name }}</td>
                                           
                                            <td>{{ $category->status == 1 ? 'Active':'Inactive' }}</td>

                                            <td>
                                                <a href="{{ route('admin.category.edit', ['id'=>$category->id]) }}" class="btn btn-primary mar-bm" href="javascript:;">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.category.delete', ['id'=>$category->id]) }}" class=" btn btn-danger mar-bm" href="javascript:;">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <h3>Record not found</h3>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </aside>
@endsection
