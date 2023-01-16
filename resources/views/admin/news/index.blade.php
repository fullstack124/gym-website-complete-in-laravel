@extends('layouts.pacakge-layout')

@section('title')
    News
@endsection
@section('content')
    <aside class="right-side right-padding">
        <section class="content-header">
            <!--section starts-->
            <h2>News</h2>
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
                    <a href="news.html">News</a>
                </li>
            </ol>
        </section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Basic charts strats here-->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> News
                            </h4>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                <i class="glyphicon glyphicon-remove removepanel"></i>
                            </span>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-bordered text-center" id="fitness-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Edit/Save</th>
                                        <th class="text-center">Delete/Cancel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($news as $new)
                                        <tr>
                                            <td>{{ $new->date }}</td>
                                            <td>{{ $new->categorys->category_name }}</td>
                                            <td>{{ $new->title }}</td>
                                            <td>
                                                <a href="{{ route('admin.new.edit', ['id'=>$new->id]) }}" class=" btn btn-primary">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.new.delete', ['id'=>$new->id]) }}" class=" btn btn-danger">
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
    </aside>
@endsection
