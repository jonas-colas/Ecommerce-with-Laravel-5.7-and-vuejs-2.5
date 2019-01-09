@extends('shop.includes.header')


@section('title', 'Shop')

@section('main_content')

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div id="app">
			<product :product="{{$products}}" :category="{{$categories}}" :filter="{{$filters}}"></product>
		</div>
	</section>

@stop
