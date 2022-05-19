<form class="console" action="/admin/modification" method="post" enctype="multipart/form-data">
	
	<input type="hidden" name="parent" value="0"><p>
	<input type="hidden" name="menu" value="1"><p>
	<input type="text" placeholder="Название" name="title" value="{{ isset($data->title)? $data->title : '' }}"><p>	
	<input type="text" placeholder="Имя" name="name" value="{{ isset($data->name)? $data->name : '' }}"><p>

	<input type="hidden" name="parent" value="{{ isset($parent)? $parent : '' }}"><p>
		
	<input type="submit" value="{{ isset($data)? 'Изменить' : 'Добавить' }}"><p>	
	@csrf
	
</form>