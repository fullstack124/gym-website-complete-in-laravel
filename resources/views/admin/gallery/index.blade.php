@extends('layouts.pacakge-layout')

@section('title')
    Gallery
@endsection
@section('content')
    <aside class="right-side right-padding">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h2>Add Gallery</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">Gallery</a>
                </li>
                <li>
                    <a href="add_gallery.html">Add Gallery</a>
                </li>
            </ol>
        </section>
        <!--section ends-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- First Basic Table strats here-->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw fa-picture-o"></i> Add Gallery
                            </h3>
                        </div>
                        <div class="panel-body" style="padding:30px;">
                            <div class="row">
                                <p>
                                    File Upload widget with multiple file selection, progress bars, validation and preview
                                    images for jQuery.
                                </p>
                                <form id="fileupload" action="#" method="POST" enctype="multipart/form-data"
                                    class="">
                                    @csrf
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    <div class="row fileupload-buttonbar">
                                        <div class="col-lg-7">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button">
                                                <i class="fa fa-fw fa-picture-o"></i>
                                                <span>Add files</span>
                                                <input type="file" name="files[]" multiple="">
                                            </span>
                                        </div>
                                    </div>
                                    <!-- The table listing the files available for upload/download -->
                                   <div id="gallery_images" style="display: grid;
                                   grid-template-columns: 1fr 1fr 1fr 1fr;
                                   gap: 21px;"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
@endsection

@section('script')
    <script>

        function getAllGallery(){
            $.ajax({
                type:'GET',
                url:'{{ route('admin.gallery.get') }}',
                success:function(data){
                    $("#gallery_images").html(data);
                }
            })
        }
        getAllGallery();
        $("#fileupload").on('change', function(e) {
            const formdata = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.gallery.add') }}',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    if(data == 1){
                        getAllGallery();
                    }else{
                        alert("Sorry not upload")
                    }
                }
            })
        })
    </script>
@endsection
