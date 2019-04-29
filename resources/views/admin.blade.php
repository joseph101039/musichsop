@extends('layout')
@section('content')
<div class="container">


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard

                    @auth
                        @if(auth()->user()->isAdmin())
                        <div class="panel-body">
                            <a href="/admin">Admin</a>
                        </div>
                    @endauth
                    @else
                    <div class="panel-heading">Normal User</div>
                    @endif      
                </div>
            </div>
     </div>
</div>
@endsection