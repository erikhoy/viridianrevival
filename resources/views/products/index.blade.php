@extends('layouts/app')
  
@section ('title')
        Products:Viridian Revival
@endsection
@php
        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
@endphp
@section ('content')
<div class="row">
	<div class="col-12 col-md-9 px-5">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/" class="text-muted">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Products</li>
			</ol>
		</nav>
	</div>
	<div class="col col-12 col-md-3 text-light px-5">
		<ul class="pagination float-right text-light">
			@if ($paginate->page_total() > 1)
				@if ($paginate->has_previous())
					<li class='previous btn btn-secondary'><a href="{{ URL::to('/products/'.$paginate->previous()) }}" class="text-light">Previous</a></li>
				@endif
				@for ($i=1;$i<=$paginate->page_total();$i++)
					@if ($i == $page)
						<li class='active btn btn-secondary ml-1'><a href="{{ URL::to('/products/'.$i) }}" class="text-light">{{ $i }}</a></li>
					@else
						<li class="btn btn-secondary ml-1"><a href="{{ URL::to('/products/'.$i) }}" class="text-light">{{ $i }}</a></li>
					@endif
				@endfor    
				@if ($paginate->has_next())
					<li class='next btn btn-secondary ml-1'><a href="{{ URL::to('/products/'.$paginate->next()) }}" class="text-light">Next</a></li>
				@endif
			@endif
		</ul>
	</div>
	<div class="row p-5">
		@foreach ($products as $product)
			@php
				$image = $product['Images'][0]['url_fullxfull'];
				$title = htmlspecialchars_decode($product['title']);
				$description = htmlspecialchars_decode($product['description']);
				$desc = substr($description,0,400);
				$url = URL::to('/products/show', $product['listing_id']);
			@endphp
			<div class="col-6 product">
				<div class="row">
					<div class="col-5 px-1 py-4">
						<img src="{{ $image }}" class="rounded shadow-lg" alt="{{ $product['title'] }}" width="100%">
					</div>
					<div class="col-7 px-3 py-4">
						<p>
							<a href="{{ URL::to('/products/show', $product['listing_id']) }}" class="text-muted"><strong>{{ $title }}</strong></a>
						</p>
						<p class="text-justify">
							{{ $desc }}...<a href="{{ $url }}" class="text-muted">Read&nbsp;More</a>
						</p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
<div class="row">
	<div class="col col-md-9">
	</div>
	<div class="col col-md-3 px-5">
		<ul class="pagination float-right">
			@if ($paginate->page_total() > 1)
				@if ($paginate->has_previous())
					<li class='previous btn btn-secondary ml-1'><a href="{{ URL::to('/products/'.$paginate->previous()) }}" class="text-light">Previous</a></li>
				@endif
				@for ($i=1;$i<=$paginate->page_total();$i++)
					@if ($i == $page)
						<li class='active btn btn-secondary ml-1'><a href="{{ URL::to('/products/'.$i) }}" class="text-light">{{ $i }}</a></li>
					@else
						<li class="btn btn-secondary ml-1"><a href="{{ URL::to('/products/'.$i) }}" class="text-light">{{ $i }}</a></li>
					@endif
				@endfor    
				@if ($paginate->has_next())
					<li class='next btn btn-secondary ml-1'><a href="{{ URL::to('/products/'.$paginate->next()) }}" class="text-light">Next</a></li>
				@endif
			@endif
		</ul>
        </div>
</div>
@endsection
