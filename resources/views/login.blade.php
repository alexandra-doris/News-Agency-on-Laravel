@extends('includes.master')

@section('content')

    <form action="{{route('signin')}}" method="post" class="form-signin mt-5">
        @csrf
      @include('includes.validation')
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block btn-grad" type="submit">Sign in</button>
    </form>

@endsection


@section('scripts')

@endsection