@extends ('layouts/app')
  
@section ('title')
        Products: Viridian Revival
@endsection

@section ('content')
<div class="row justify-content-around px-5">
        <div class="col-sm-6 col-lg-9">
		<nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/" class="text-muted">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admin</li>
                        </ol>
                </nav>
	</div>
	<div class="col-sm-6 col-lg-3">
		<ul>
			<li><a href="/products/add">Add Product</a></li>
		</ul>
	</div>
</div>

@endsection
