@extends('layout')
@section('content')
    <h4 class="text-center text-success">
        List of Users
    </h4>
    <div>
        <a class="add-user btn btn-lg btn-success" href="{{route('create_new_user')}}">
            <span class="glyphicon glyphicon-plus"></span> &nbsp;
            User
        </a>
    </div>
    <div class="row row-header list-group-item-info">
        <div class="col-md-3 col-sm-3 col-xs-3 text-center">
            Name
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 text-center">
            Address
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 text-center">
            Country
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 text-center">
            Status
        </div>
    </div>
    <ul class="list-group">
        @foreach($users as $user)
            <li class="list-group-item user-div">
                <a class="{{$user->active !== 1 ? 'text-danger' : ''}}"
                   href="{{route('user_details', ['user' => $user->id])}}" class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3 text-center text-primary {{$user->active !== 1 ? 'text-danger' : ''}}">
                        {{$user->name}}
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-center text-primary {{$user->active !== 1 ? 'text-danger' : ''}}">
                        {{$user->address}}
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center text-primary {{$user->active !== 1 ? 'text-danger' : ''}}">
                        {{$user->country}}
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center text-primary {{$user->active !== 1 ? 'text-danger' : ''}}">
                        {{$user->active === 1 ? 'Still in batch' : 'Left the batch'}}
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1">
                        <span class="glyphicon glyphicon-pencil"/>
                    </div>
                </a>
                <div class="col-xs-1 col-sm-1 col-md-1">
                    <span class="glyphicon glyphicon-trash text-danger remove-user" data-userId="{{$user->id}}"/>
                </div>
            </li>
        @endforeach
    </ul>
    <script>
        function removeUser() {
            $('.remove-user').on('click', function (e) {
                if (confirm('Are you sure ?')) {
                    var $target = e.currentTarget
                    var userId = $target.getAttribute('data-userId')
                    var csrfToken = '{{csrf_token()}}'
                    $.ajax({
                        type: 'DELETE',
                        url: `/user/${userId}/delete`,
                        data: {"_token": csrfToken},
                    }).done(function (data) {
                        if (data === 'ok') {
                            window.location.href = '/'
                        }
                    })
                }
            })
        }

        removeUser()
    </script>
@endsection