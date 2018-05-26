@extends('layout')

@section('content')
    <div class="card col-md-8 col-sm-6 col-sm-offset-2 col-md-3">
        <form class="card-body" method="POST" action="{{$action}}">
            <input type="hidden" name="_method" value="{{$methodType}}"/>
            <h4 class="text-center text-primary">User Details</h4>
            <hr>
            <div class="form-group">
                <label for="name">Full name:</label>
                <input type="text" name="name" value="{{$user->name}}" placeholder="full name" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="Address">Address:</label>
                <input type="text" name="address" value="{{$user->address}}" placeholder="address"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" value="{{$user->country}}" placeholder="country"
                       class="form-control"/>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a class="add-user btn btn-lg btn-info" href="/">
                        <span class="glyphicon glyphicon-chevron-left"></span> &nbsp;
                        Back
                    </a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-lg btn-success pull-right">
                        Save &nbsp;
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                </div>
            </div>
            {{ csrf_field() }}
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection