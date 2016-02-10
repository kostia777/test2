<?php require ('lock.php') ?>
<?php require ('header.php') ?>
<br><br>
<h1> Добро пожаловать в Админку </h1>


 <div class="container">

<table class="table table-striped" border="1" cellpadding="0" cellspacing="0">


 <tr >
  <td><b>#</b></td>

  <td align="center"><b>Время</b> </td>
  <td align="center"><b>Имена </b> </td>
  <td align="center"><b>E-Mail </b></td>
  <td align="center"><b>Тема </b></td>
  <td align="center"><b>Сообщения </b></td>
<td align=\"center\"><b>Удаление</b></td>
 <td align=\"center\"><b>Редактировать</b></td>
 </tr>
 
<?php foreach ($records as $row):?> 

<?php

    echo "<tr>\n";
    echo "<td>".$row['id']."</td>\n";
    echo "<td><span class='data'>".$row['data']."</span></td>\n";
    echo "<td>".$row['name']."</td>\n";
    echo "<td>".$row['email']."</td>\n";
    echo "<td>".$row['theme']."</td>\n";
   echo "<td>".$row['message']."</td>\n";
/* Генерируем ссылку для удаления поля */
    echo "<td><a name=\"del\" href=\"index.php?act=admin&del=".$row["id"]."\">Удалить</a></td>\n";

 /* Генерируем ссылку для редактирования поля */
    echo "<td><a name=\"del\" href=\"index.php?act=admin&edit=".$row["id"]."\">Редактировать</a></td>\n";
 echo "</tr>\n";

  ?>

<?php endforeach    ?>


</table>
</div>


<?php require ('footer.php') ?>



