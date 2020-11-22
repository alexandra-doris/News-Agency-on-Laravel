@extends('includes.backmaster')

@section('content')
    
        <table class="table table-dark table-hover" style="width:800px; text-align:left">
            <tbody>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>    </th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img src="{{asset('/storage/'.$user->image)}}" width="30px" height="30px" style="border-radius:50%; margin-left: 5px "/></td>
                        <td>{{$user->fname}}</td>
                        <td>{{$user->lname}}</td>
                        <td>{{$user->email}}</td>
                        @if ($user->admin)
                            <td>Editor</td>
                        @else
                            <td>Writer</td>
                        @endif
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