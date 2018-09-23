@extends ('layouts/app')
  
@section ('title')
        View Product: Viridian Revival
@endsection

@section ('content')
<div class="row justify-content-around">
        <div class="col-12 px-5 pb-5">
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/" class="text-muted">Home</a></li>
				<li class="breadcrumb-item"><a href="/products/listed_products/1" class="text-muted">Products</a></li>
				<li class="breadcrumb-item active" aria-current="page">View Product</li>
                        </ol>
                </nav>
	</div>
        <div class="col-12 px-5">
		@php
			$image = $product['Images'][0]['url_fullxfull'];
			$title = htmlspecialchars_decode($product['title']);
			$price = $product['price'];
			$description = htmlspecialchars_decode($product['description']);	
		@endphp
		<div class="row justify-content-around mb-2">
			<div class="col-4">
				<img src="{{ $image }}" class="text-center rounded shadow-lg mx-3 mb-3" alt="" width="100%">
			</div>
			<div class="col-8 px-5">
				<p><strong>{{ $title }}</strong></p>
				<p>${{ $price }}</p>
				<p>{{ $description }}</p>
			</div>
		</div>
	</div>
</div>
@endsection

