@extends('layouts.index')

@section('content')

	@foreach ($attachdata as $item)
		<h2>{{ $item->title }} </h2>
		<img src="../images/asset/{{ $item->img }}"/>
		<p>{!! $item->content !!}</p>
		<hr>
	@endforeach	
@endsection

@section('navigation')

	<nav>
		<ul class="menu">

		@foreach ($menu as $item)
		
			<li><a href="/{{ $item->name }}"><span>{{ $item->title }}</span></a>
				<ul class="submenu">

					@foreach ($attachmenu as $attach)

						@if ($attach->parent == $item->id && $attach->menu == 1)
							<li><a href="/{{ $item->name }}/{{ $attach->name }}"><span>{{ $attach->title }}</span></a>
						@endif

					@endforeach

				</ul>
			</li>
		
		@endforeach
		</ul>
	</nav>

@endsection