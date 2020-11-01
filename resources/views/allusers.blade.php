@extends('includes.master')

@section('content')
        <table style="width:800px; text-align:left">
            <tbody>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->fname}}</td>
                        <td>{{$user->lname}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="/admin/users/{{$user->id}}">View user</a></td>
                    </tr>          
                @endforeach
                </tbody>
            </tbody>
        </table>

        {{$users->links()}}
@endsection


@section('scripts')

@endsection