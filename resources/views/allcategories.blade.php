@extends('includes.backmaster')

@section('content')

@include('includes.validation')

<div class="row justify-content-center">
    <div class="col-auto">
        <table class="table table-dark table-hover" style="width:800px; text-align:left">
            <tbody>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cats as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->title}}</td>
                        <td>{{$cat->slug}}</td>
                        <td><a href="/admin/category/{{$cat->id}}">View category</a></td>
                    </tr>          
                @endforeach
                </tbody>
            </tbody>
        </table>
        {{$cats->links()}}
    </div>
</div>
@endsection


@section('scripts')

@endsection