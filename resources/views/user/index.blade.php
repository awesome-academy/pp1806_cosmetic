@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">{{ __('user.user_list') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('user.stt') }}</th>
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
                                        <img src="{{ asset("/images/".$users->image) }}" height="80" width="80"/>
                                        </td>
                                    <td>
                                        <a href="/user/{{ $users->id }}">{{ $users->name }}</a>
                                    </td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->phone_number }}</td>
                                    <td>{{ $users->address }}</td>
                                    <td>
                                        <a href="user/{{ $users->id }}/edit" class="btn btn-info" role="button">{{ __('user.edit') }}</a>
                                        {{--<a href="#" class="btn btn-info btn-del-user" role="button" data-user-id="{{ $users->id }}">{{__('category.del')}}</a>--}}
                                        <form action="{{ route('user.destroy',[$users->id]) }}" method="POST">
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
    </div>
    {{--<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>--}}
    {{--<script src="{{ asset('js/delete_users.js') }}"></script>--}}
@endsection
