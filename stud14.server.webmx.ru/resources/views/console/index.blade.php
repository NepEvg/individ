
@extends('layouts.index')

@section('content')
	
	<h1>Консоль управления</h1>
	<h2>Редактирование данных</h2>
	
	<!-- выводим записи верхнего уровня, добавляем ссылку на изменение -->
	@foreach ($data as $item)
		@if ($item->name != "console")
			<h4>
				{{ $item->title }} (<a href="/console/update/{{ $item->id }}"> Изменить</a>
				
				<?php
				$count = DB::table("posts")->where("parent", "=", $item->id)->where("menu", "=", "1")->select("id")->get()->count();
				?>
				@if ($count == 0)
					<a href="/admin/delete/{{ $item->id }}"> / Удалить</a>
				@endif
				)
			</h4>
		@endif
	@endforeach

	<form class="console" action="/console/addpage" method="post">
		<input type="submit" value="Новая страница">
		@csrf
	</form>

@endsection

@section('navigation')

	<nav>
		<ul class="menu">

		@foreach ($data as $item)
		
			<li><a href="/{{ $item->name }}"><span>{{ $item->title }}</span></a>
				<ul class="submenu">

					@foreach ($attachdata as $attach)

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