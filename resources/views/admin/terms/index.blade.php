@extends('layouts.admin')

@section('customcss')
<link href="{{ env('COMMON_HOST') . 'assets/admin/css/dataTables.bootstrap4.css' }}" rel="stylesheet">
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">{{ ucwords($page['term']) }}</li>
        </ol>

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>List {{ ucfirst($page['name']) }}</h2>
            </div>
            <div class="row">
                @foreach($terms as $term)
                <div class="col-md-4">
                    <a class="btn_1 width-100 mb-3 text-center" href="{{ route('admin.term.list', ['name' => $term->term_type]) }}">{{  ucwords(str_replace('_', ' ', $term->term_type)) }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('customjs')
@endsection
