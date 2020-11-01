@extends('includes.master')

@section('content')
<h1>{{$title}}</h1>
<p>Existing users:</p>

<ul>
    @foreach($users as $user)
       <li> <a href="/admin/users/{{$user->id}}">{{$user->fname}} {{$user->lname}} - {{$user->email}}</a></li>
    @endforeach
</ul>
@endsection


@section('scripts')
<script></script>
@endsection