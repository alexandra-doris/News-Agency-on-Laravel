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
                        <td><a class="btn-grad" href="/admin/category/{{$cat->id}}">Edit category</a> <a class="btn-grad" href="/category/{{$cat->slug}}">View category</a></td>
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