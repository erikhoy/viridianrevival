@extends ('layouts/app')
  
@section ('title')
        Contact: Viridian Revival
@endsection

@section ('content')
<div class="row justify-content-around pb-5">
	<div class="col-12 px-5">
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/" class="text-muted">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                </nav>
	</div>
	<div class="row justify-content-around">
		<div class="col-10">
			@if ($errors->any())
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>
	<div class="row justify-content-around">
		<div class="col-12 col-md-9 py-3">
			@if (Session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
				</div>
			@endif
			{!! Form::open(['route'=>'contactus.store']) !!}
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{!! Form::label('Name:') !!}
					{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					{!! Form::label('Email:') !!}
					{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
				<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
					{!! Form::label('Message:') !!}
					{!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
					<span class="text-danger">{{ $errors->first('message') }}</span>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Contact Us!</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
