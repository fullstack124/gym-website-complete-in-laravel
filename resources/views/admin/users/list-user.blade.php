@extends('layouts.pacakge-layout')

@section('title')
    User
@endsection
@section('content')
    <aside class="right-side right-padding">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h2>Users List</h2>
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
                    <a href="admin_userlist.html">Users List</a>
                </li>
            </ol>
        </section>
        <!--section ends-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-fw fa-line-chart"></i> Users Trend
                            </h4>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                <i class="glyphicon glyphicon-remove removepanel"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div id="bar-chart-stacked" class="flotChart1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--main content-->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Basic charts strats here-->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-fw fa-file-text-o"></i> Users List
                            </h4>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                <i class="glyphicon glyphicon-remove removepanel"></i>
                            </span>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-bordered" id="fitness-table">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Gender</th>
                                        <th>Edit</th>
                                        <th>Delete/Cancel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"
                                                    class=" btn btn-primary" href="javascript:;">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}"
                                                    class=" btn btn-danger" href="javascript:;">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <h4>Record not found</h4>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-md-6 -->
            <!--row -->
        </div>
        <!--row ends-->
        <!-- /.content -->
    </aside>
@endsection
