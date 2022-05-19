<!-- 
	используем одну форму и для добавления и для обновления записи
-->
<form class="console" action="/admin/modification" method="post" enctype="multipart/form-data">
	
	
	<input type="text" placeholder="Название" name="title" value="{{ isset($data->title)? $data->title : '' }}"><p>	
	<textarea name="content">{{ isset($data->content)? $data->content : '' }}</textarea><p>
	<input type="text" placeholder="Имя" name="name" value="{{ isset($data->name)? $data->name : '' }}"><p>
	<label>Прикрепить изображение: </label>
	<input type="file" name="image" /><p>
	
	@if (isset($data))
		<input type="hidden" name="parent" value="{{ isset($data->parent)? $data->parent : '' }}"><p>
	@elseif (isset($parent))
		<input type="hidden" name="parent" value="{{ isset($parent)? $parent : '' }}"><p>
	@endif
	<input type="hidden" name="id" value="{{ isset($data->id)? $data->id : '' }}"><p>	
	<input type="hidden" name="menu" value="{{ isset($data->menu)? $data->menu : '' }}"><p>
	<input type="submit" value="{{ isset($data)? 'Изменить' : 'Добавить' }}"><p>	
	@csrf
	
</form>