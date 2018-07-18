<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/adminStyle.css">
    <title>Панель администратора</title>
</head>

<body>
<div class="adminPanel">
<button class="add"><a href="../admin/index.php?action=add">Добавить статью</a></button>

<table>
    <tr>
        <th class="date">Дата</th>
        <th>Заголовок</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($articles as $a):
       ?>
    <tr class="oneNews">
        <td><?php echo $a[3]?></td>
        <td><?php echo $a[1]?></td>
        <td><button class="edit"><a href="../admin/index.php?action=edit&id=<?php echo $a[0]?>">Редактировать</a></button>

        </td>
        <td>
            <button class="del"><a href="../admin/index.php?action=delete&id=<?php echo $a[0]?>">Удалить</a></button>

        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</body>
</html>
