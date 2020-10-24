@extends('includes.master')

@section('content')
<h1>{{$title}}</h1>
<p>Existing users:</p>

<ul>
    @foreach($users as $user)
       <li> {{$user->fname}} {{$user->lname}} - {{$user->email}}</li>
    @endforeach
</ul>
@endsection


@section('scripts')
<script></script>
@endsection