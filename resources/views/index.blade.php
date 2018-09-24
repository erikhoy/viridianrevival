@extends('layouts/app')

@section ('title')
	Viridian Revival
@endsection

@section ('content')
<div class="row justify-content-around py-5">
	<div class="col-sm-6 col-lg-7">
		<h1 class="text-center">Welcome!</h1>
		<p class="text-justify px-2"><img src="http://viridianrevival.com/admin/images/strongman.jpg" class="rounded shadow-lg mx-3 mb-3" alt="Strongman toy" width="20%" align="right">People’s trash fascinates us. We have spent many hours alley shopping and dumpster diving, finding things that aren’t quite ready for the landfill. We find vintage chairs to paint and reupholster, industrial or mechanical items become lighting, and found wood becomes Adirondack chairs, sofas, tables, benches or other furniture.</p>
		<p class="text-justify px-2">As time has passed, the complexity of our projects broadened, as did our search for different materials. Increasingly, we were led to garage sales, estate sales, thrift stores and online auctions, and we found ourselves snatching up vintage items to be used for our own home decor.</p>
		<p class="text-justify px-2">Over time, certain items must be let go, however painful, to make room for new acquisitions&hellip;or just to make space. There are also those items that we find in our search that we feel need to be rediscovered by people like you.</p>
		<p class="text-justify px-2">We stock this store with things that we love; the things that catch our eyes on our endless search. They are the kinds of things that we would use to decorate our own spaces, because let’s face it, if it doesn’t sell, we’re &lsquo;stuck&rsquo; with it. Those things include art, housewares (clocks, collector plates, small appliances, vases, knick-knacks, lamps, dishes, sewing stuff), toys and games, sporting goods &amp; memorabilia, costume jewelry, erotica, books and comic books, tobacciana, cocktail &amp; bar supplies, gaming/gambling supplies &mdash; all vintage.</p>
		<h2 class="text-center">Recent Reviews</h2>
	</div>
	<div class="col-sm-6 col-lg-5">
		<h2 class="text-center">Recently Added Products</h2>
		@for ($i=0;$i<=4;$i++)
			@php
				$image = $products['results'][$i]['Images'][0]['url_fullxfull'];
				$title = $products['results'][$i]['title'];
				$price = $products['results'][$i]['price'];
				$listing_id = $products['results'][$i]['listing_id'];
			@endphp
			<div class="row justify-content-around mb-2">
				<div class="col-4">
					<img src="{{ $image }}" class="text-center rounded shadow-lg mx-3 mb-3" alt="" width="100%">
				</div>
				<div class="col-8">
					<p></strong>{{ $title }}</strong><br>
					${{ $price }}</p>
					<button class="btn btn-success"><a href="products/show/{{ $listing_id }}" class="text-white">View</a></button>
				</div>
			</div>		
		@endfor
	</div>
</div>
@endsection
