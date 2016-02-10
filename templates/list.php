<?php require ('header.php') ?>

<br><br>

 <h1> Вывод сообщений </h1>

<div class="container">

<table class="table table-striped"  >


 <tr>
  
  <td align="center"><b>Время</b> <br> <a href="index.php?i=1"> <img src="http://www.goal.dp.ua/blog/img/up.png" width="25"height="25"></a><a href="index.php?i=0"><img src="http://www.goal.dp.ua/blog/img/dn.png"width="25"height="25"></a></td>
  <td align="center"><b>Имена </b> <br> <a href="index.php?i=2"> <img src="http://www.goal.dp.ua/blog/img/up.png" width="25"height="25"></a><a href="index.php?i=3"><img src="http://www.goal.dp.ua/blog/img/dn.png"width="25"height="25"></a></td>
  <td align="center"><b>E-Mail </b><br> <a href="index.php?i=4"> <img src="http://www.goal.dp.ua/blog/img/up.png" width="25"height="25"></a><a href="index.php?i=5"><img src="http://www.goal.dp.ua/blog/img/dn.png"width="25"height="25"></a></td>
 

 </tr>



 
<?php foreach ($records as $row):?> 
 <tr>
<td colspan="3">
<div class="container">
<h4> # <? echo $row['id']; ?> </h4> 
<? if($row['admin']) echo '<small>(Изменено Администратором)</small>';?>
<address>
  <strong> <? echo $row['name']; ?> </strong><br>
<a href="mailto:#"><? echo $row['email']; ?></a><br>
Тема: <? echo $row['theme']; ?> <br>

<blockquote>
  <p><? echo $row['message']; ?></p>
  <footer>Время написания коментария <cite title="Source Title"><? echo $row['data']; ?></cite></footer>
</blockquote>
</address>
</div>
</td>
 </tr>
<?php endforeach    ?>

<tr>
<td colspan="3">
<?php require ('comment.php') ?>

</td>
</tr>

</table>
</div>

<?php require ('footer.php') ?>