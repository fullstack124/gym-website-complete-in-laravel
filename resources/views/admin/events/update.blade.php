@extends('layouts.pacakge-layout')

@section('title')
    Update
@endsection
@section('content')
    <aside class="right-side right-padding">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2> Update Events </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="events_list.html">Update Events </a>
                </li>
            </ol>
        </section>
        <!--section ends-->
        <div class="container-fluid">
            <!--main content-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-fw fa-calendar"></i> Update Event
                            </h4>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                <i class="glyphicon glyphicon-remove removepanel"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="events_for" method="POST" action="{{ route('admin.event.update', ['id' => $event->id]) }}"
                                        enctype="multipart/form-data" class="form-horizontal">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="title" class="col-md-3 control-label">
                                                    Event Title
                                                    <span class='require'> *</span>
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-fw fa-file-text-o"></i>
                                                        </span>
                                                        <input type="text" value="{{ $event->title }}" name="title"
                                                            id="title" class="form-control" placeholder="Enter Title"
                                                            required>
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Image</label>
                                                <div class="col-md-7 text-center">
                                                    <div class="input-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail"
                                                                style="width: 200px; height: 150px;">
                                                                @if ($event->image)
                                                                    <img src="{{ asset('storage') }}/{{ $event->image }}"
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
                                                                <a href="#" class="btn btn-primary fileinput-exists"
                                                                    data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                            <input type="hidden" name="old_image"
                                                                value="{{ $event->image }}" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="start">
                                                    Start *
                                                </label>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id=''>
                                                        <input type='date' value="{{ $event->start_date }}"
                                                            class="form-control" name="start_date" id="start" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                    @error('start_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            <label class="col-md-1 control-label" for="end">
                                                End *
                                            </label>
                                            <div class="col-md-3">
                                                <div class='input-group date' id=''>
                                                    <input type='date' value="{{ $event->end_date }}"
                                                        class="form-control" name="end_date" id="end" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                                @error('end_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">
                                                Description
                                                <span class='require'> *</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <textarea class="summernote edi-css form-control" name="content">{{ $event->content }}</textarea>
                                                </div>
                                                @error('content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-7">
                                            <input type="submit" class="btn btn-primary" value="Add"> &nbsp;
                                            <input type="button" class="btn btn-danger" value="Cancel"> &nbsp;
                                            <input type="reset" id="add-news-reset-editable" class="btn btn-default"
                                                value="Reset">
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
      
        <!--row ends-->
        </div>
        <!-- /.content -->
    </aside>
@endsection
