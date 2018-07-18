<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/adminStyle.css">
    <title>Document</title>
</head>

<body>
<div class="container">

    <form method="post" action="index.php?action=edit&id=<?php echo $_GET['id']?>" class="form-group" enctype="multipart/form-data">
        <!--        <div class="form-group">-->
        <label for="title"> Заголовок статьи *</label>
        <input type="text" name="title" id="title" value="<?php echo $article[1]?>" class="form-control" autofocus required>

        <label for="content"> Статья * </label>
        <textarea name="content" class="form-control" id="content" required>"<?php echo $article[2]?></textarea>

        <label for="date"> Дата статьи *</label>
        <input type="date" name="date" id="date" value="<?php echo $article[3]?>" class="form-item" required><br>

        <label for="photo1"> Главное фото *</label>
        <input type="text" name="photo1" id="photo1" value="<?php echo $article[4]?>" class="form-photo"
               required>

        <label for="photo2"> Фото 2</label>
        <input type="text" name="photo2" id="photo2" value="<?php echo $article[5]?>" class="form-photo">

        <label for="photo3"> Фото 2</label>
        <input type="text" name="photo3" id="photo3" value="<?php echo $article[6]?>" class="form-photo">

        <label for="photo4"> Фото 4</label>
        <input type="text" name="photo4" id="photo4" value="<?php echo $article[7]?>" class="form-photo">

        <label for="photo5"> Фото 5</label>
        <input type="text" name="photo5" id="photo5" value="<?php echo $article[8]?>" class="form-photo">

        <label for="photo6"> Фото 6</label>
        <input type="text" name="photo6" id="photo6" value="<?php echo $article[9]?>" class="form-photo">

        <label for="photo7"> Фото 7 </label>
        <input type="text" name="photo7" id="photo7" value="<?php echo $article[10]?>" class="form-photo">

        <label for="photo8"> Фото 8 </label>
        <input type="text" name="photo8" id="photo8" value="<?php echo $article[11]?>" class="form-photo">

        <label for="photo9"> Фото 9</label>
        <input type="text" name="photo9" id="photo9" value="<?php echo $article[12]?>" class="form-photo">

        <p>* - поля обязательные для заполнения</p>
        <input type="submit" value="Сохранить" class="btn">

    </form>

</div>
</body>
</html>