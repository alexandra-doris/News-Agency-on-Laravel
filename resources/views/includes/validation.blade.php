@if(session()->has('success'))
        <h2>{{session()->get('success')}}</h2>
@endif

@if(session()->has('danger'))
        <h2>{{session()->get('danger')}}</h2>
@endif

@if($errors->any())
		<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
@endif