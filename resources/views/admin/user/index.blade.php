@extends('adminlte::page')

@section('title', 'User List')

@section('content_header')
    <h1>User List</h1>
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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success" style="display: none"></div>
                    <div class="alert alert-warning" style="display: none;"></div>
                    <table id="products" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('user.img_pro') }}</th>
                            <th scope="col">{{ __('user.name') }}</th>
                            <th scope="col">{{ __('user.email') }}</th>
                            <th scope="col">{{ __('user.phone') }}</th>
                            <th scope="col">{{ __('user.add') }}</th>
                            <th scope="col">{{ __('user.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($user as $users)
                            <tr class="row_{{ $users->id }}">
                                <th scope="row">{{ $users->id }}</th>
                                <td>
                                    @if(!$users->image)
                                        <img src="https://www.lalintas.com/images/default_profile.png" height="80" width="80">
                                    @endif
                                    @if($users->image)
                                        <img src="{{ asset("/images/".$users->image) }}" height="80" width="80"/>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.user.show', ['user' => $users->id]) }}">{{ $users->name }}</a>
                                </td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->phone_number }}</td>
                                <td>{{ $users->address }}</td>
                                <td>
                                    <a href="{{ route('admin.user.edit', ['user' => $users->id]) }}" class="btn btn-info" role="button">{{ __('user.edit') }}</a>
                                    {{--<a href="#" class="btn btn-info btn-del-user" role="button" data-user-id="{{ $users->id }}">{{__('category.del')}}</a>--}}
                                    <form action="{{ route('admin.user.destroy',[$users->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">{{ __('user.del') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="pull-right">{{ $user->links() }}</div>
                </div>
            </div>
        </div>
    </section>
    {{--<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>--}}
    {{--<script src="{{ asset('js/delete_users.js') }}"></script>--}}
@endsection

@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
