@extends('adminlte::page')

@section('title', 'Category List')

@section('content_header')
    <h1>{{ __('category.list') }}</h1>
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if (session('status'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="alert alert-success" style="display: none"></div>
                        <div class="alert alert-warning" style="display: none;"></div>

                        <table id="products" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('category.name')}}</th>
                                <th scope="col">{{__('category.parent')}}</th>
                                <th scope="col">{{ __('category.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $categories)
                                <tr class="row_{{ $categories->id }}">
                                    <th scope="row">{{ $categories->id }}</th>
                                    <td>
                                        {{ $categories->name }}
                                    </td>
                                    <td>
                                        {{ $categories->parent_id }}

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', ['category' => $categories->id]) }}" class="btn btn-info" role="button">Edit</a>
                                        {{--<a href="products/{{ $product->id }}" class="btn btn-info" role="button">View</a>--}}
                                        {{--<a href="#" class="btn btn-danger btn-del-brand" role="button" data-brand-id="{{ $brands->id }}">Delete</a>--}}

                                        <form action="{{ route('admin.category.destroy',[$categories->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete" type="submit">{{ __('category.del') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('category.name')}}</th>
                                <th scope="col">{{__('category.parent')}}</th>
                                <th scope="col">{{ __('category.action') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
