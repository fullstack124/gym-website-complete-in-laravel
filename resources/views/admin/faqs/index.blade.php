@extends('layouts.pacakge-layout')

@section('title')
    Gallery
@endsection
@section('content')
    <aside class="right-side right-padding">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h2>Faq</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="faq.html">Faq</a>
                </li>
            </ol>
        </section>
        <!--section ends-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        @foreach ($categorys as $category)
                            <li class="m10">
                                <a href="#faq{{ $category->id }}" data-toggle="tab" class="list-group-item"
                                    aria-expanded="false">
                                    {{ $category->category_name }}
                                    <i class="fa fa-fw fa-chevron-right mrg"></i>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        @foreach ($categorys as $category)
                            <div class="tab-pane fade" id="faq{{ $category->id }}">
                                <div class="panel-group" id="accordion{{ $category->id }}">
                                    @php
                                        $faqs = \App\Models\Faq::latest()->get();
                                    @endphp
                                    @forelse ($faqs as $faq)
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion{{ $faq->id }}"
                                                    href="#collapse{{ $faq->id }}" aria-expanded="false"
                                                    class="collapsed">
                                                    <h4 class="panel-title">
                                                        {{ $faq->title }}
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="collapse{{ $faq->id }}" class="panel-collapse collapse"
                                                aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body d-flex justify-content-between align-items-baseline">
                                                    <p>
                                                        {!! $faq->description !!}
                                                    </p>
                                                    <a href="{{ route('admin.faq.edit', ['id' => $faq->id]) }}"
                                                        class="btn btn-success">
                                                        <i class="fa fa-fw fa-edit"></i> Edit</a>

                                                    <a href="{{ route('admin.faq.delete', ['id' => $faq->id]) }}"
                                                        class=" btn btn-danger mar-bm">
                                                        <i class="fa fa-trash-o"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h4>Record not found</h4>
                                    @endforelse

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </aside>
@endsection

@section('script')
@endsection
