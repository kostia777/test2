<div align="center">

<h3>

<?
if($edit)
{
echo "Редактируем запись ID = ".$edit;
$act='admin';
}

?>

</h3>

<table border="0" cellpadding="0" cellspacing="0"><tr><td>

<form action="index.php" method="GET" name="test_form" class="form-horizontal" >


  <div class="form-group">
    <label for="exampleInputName2">Имя</label>
    <input type="text" name="test_name" class="form-control" id="exampleInputName2" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Email</label>
    <input type="email" name="test_mail" class="form-control" id="exampleInputEmail2" placeholder="">
  </div>

<div class="form-group">
    <label>Тема сообшения</label>
   <input type="text" name="test_theme" class="form-control" placeholder="">
</div>


<div class="form-group">
    <label>Сообшение</label>
   <input type="text" name="test_mess" class="form-control" placeholder="">
</div>
  

<div class="form-group">
    <label for="exampleInputFile">Файл картинка</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Это форма для загрузки аватарки</p>
  </div>

<div class="form-group">
<input type="hidden" name="update" value="<? echo$edit; ?>">
<input type="hidden" name="act" value="<? echo$act; ?>">
</div>

  <button type="submit" class="btn btn-default">Записать</button>

</form>


 </td>
 </tr>
</table>


</div>


  


























