@extends ('layouts/app')

@section ('title')
        Add Product: Viridian Revival
@endsection

@section ('content')
<div class="row justify-content-around pb-5">
        <div class="col-12 px-5">
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/" class="text-muted">Home</a></li>
				<li class="breadcrumb-item"><a href="/products/listed_products/1" class="text-muted">Products</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add</li>
                        </ol>
                </nav>
	</div>
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
		{!! Form::open(['route'=>'products.store']) !!}
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				{!! Form::label('Name:') !!}
				{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
				<span class="text-danger">{{ $errors->first('name') }}</span>
			</div>
			<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
				{!! Form::label('Price:') !!}
				{!! Form::text('price', old('price'), ['class'=>'form-control', 'placeholder'=>'Enter Price']) !!}
				<span class="text-danger">{{ $errors->first('price') }}</span>
			</div>
			<div class="form-group {{ $errors->has('source') ? 'has-error' : '' }}">
				{!! Form::label('Source:') !!}
				{!! Form::text('source', old('source'), ['class'=>'form-control', 'placeholder'=>'Enter Source']) !!}
				<span class="text-danger">{{ $errors->first('source') }}</span>
			</div>
			<div class="form-group">
				<button class="btn btn-primary">Add Product</button>
			</div>
		{!! Form::close() !!}
        </div>
</div>
@endsection

