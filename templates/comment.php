<div class="container">
<h3>

Добавте свое сообщение

</h3>

<form action="index.php" method="GET" id="commentform" name="test_form" class="form-horizontal">

	<div class="form-group">
		<input type="text" name="test_name"  id="author"    class="form-control" placeholder="Введите имя"   />
		
	 </div>

	<div class="form-group">

		<input type="email" name="test_mail" id="email" class="form-control"  placeholder="jane.doe@example.com" />
		
	 </div>

	<div class="form-group">
		<input type="text" name="test_theme" id="tema" class="form-control" placeholder="Тема сообшения" />
	
	 </div>

	<p>



<textarea name="comment" id="comment" class="form-control"  >

	</textarea></p>

	<p>
		<input name="submit" type="submit" id="submit" class="btn btn-default" value="Отправить"  />
	</p>

</form>

</div>