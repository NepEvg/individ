@extends('layouts.index')

@section('content')

	<h1>Форма {{ $flag }}</h1>

	@if ($flag == 1)
		@include('console.form')
	@elseif ($flag == 2)
		@include('console.pageform')
	@elseif ($flag == 3)
		@include('console.newchapter')
	@endif

	

	@if (isset($attachdata) && count($attachdata))
		<hr>					
		<h2>Прикрепленные записи</h2>						
		@foreach ($attachdata as $item)
			@if ($item->menu != 1)
				{{ $item->title }} (
				<a href="/console/update/{{ $item->id }}">Изменить</a> /  
				<a href="/admin/delete/{{ $item->id }}">Удалить</a>) </p><br>
			@endif
		@endforeach
		<hr>					
		<h2>Разделы</h2>						
		@foreach ($attachdata as $item)
			@if ($item->menu == 1)
				{{ $item->title }} (
				<a href="/console/update/{{ $item->id }}">Изменить</a> /  
				<a href="/admin/delete/{{ $item->id }}">Удалить</a>) </p><br>
			@endif
		@endforeach

	@endif 

	<!--  
	если родительская запись разрешает прикреплять подчиненные (свойство allowed записи) 
	то выводим форму добавления новой записи, при этом
	не забыть передать идентификатор родительской записи (свойство parent)
	-->
	<hr>
	@if (isset($data))
		<form class="console" action="/console/add" method="post">
			<input type="hidden" name="parent" value="{{ $data->id }}"><p>	
			<input type="submit" value="Прикрепить новую запись">
			@csrf
		</form>
		<form class="console" action="/console/addchapter" method="post">
			<input type="hidden" name="parent" value="{{ $data->id }}"><p>	
			<input type="submit" value="Создать раздел">
			@csrf
		</form>
	@endif

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