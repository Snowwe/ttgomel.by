<?php
include $_SERVER['DOCUMENT_ROOT'] . "/scripts/galleryScriptPHP.php";
$dir = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery_sportsmen/";
$shortDir = "../../images/gallery_sportsmen/";
$imgSportsman = get_files($dir);
$f = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery_sportsmen/00_infoSportsmen.txt";//файл, где находится инфо о спортсменах
$infoSp = get_img_info($f);
?>

<!--подключаем стили для страницы Галерея-->
<link rel="stylesheet" href="../../css/galleryStyle.css">
<!--<link rel="stylesheet" type="text/css" media="all" href="../../css/lightbox/jquery.lightbox-0.5.css">-->
<link rel="stylesheet" href="../../modules/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="../../modules/owlcarousel/assets/owl.theme.default.min.css">
<link href="../../modules/lightbox/css/lightbox.css" rel="stylesheet">

<div class="gallery">
    <h3>Наши тренеры</h3>
    <hr>
    <div class="ourTrainers">
        <div class="trainerOne">
            <img src="../../images/gallery_trainer/1_Shutov_A_main.jpg" alt="Шутов Андрей Васильевич"
                 title="Шутов Андрей Васильевич"
                 class="imgTrainerOne">
            <div class="trainerInfoOne">
                <h4>Шутов Андрей Васильевич</h4>
                <p>Старший тренер отделения н/тенниса высшей категории, МС, победитель областных, республиканских и
                    международных соревнований, абсолютный чемпион ПРБ по н/теннису</p>
            </div>
        </div>
        <div class="trainerTwo">
            <img src="../../images/gallery_trainer/2_Ostapenko_E_main.jpg"
                 alt="Остапенко Елена Николаевна"
                 title="Остапенко Елена Николаевна" class="imgTrainerTwo">
            <div class="trainerInfoTwo">
                <h4>Остапенко Елена Николаевна</h4>
                <p>Тренер отделения н/тенниса первой категории</p>
            </div>
        </div>
    </div>

    <div class="ourSportsmen">
        <h3>Наши спортсмены</h3>
        <hr>

        <div class="owl-carousel  gallerySportsmen">
            <?php
            $rows = count($imgSportsman);

            $j = 0;
            foreach ($imgSportsman

                     as $image) { ?>
                <?php
                $infoSpShort = explode(";", $infoSp[$j]);
                ?>

                <div class="sportsman " >
                    <a  href="<?php echo $shortDir . $image ?>" data-title="<?php echo $infoSpShort[0].'<br>'.$infoSpShort[1]; ?>"  data-lightbox="sportsman">

                        <img src="<?php echo $shortDir . $image ?>" class="imgSportsman">
                        <span class="infoSportsman"><?php
                            echo $infoSpShort[0];
                            ?></span>
                        <span class="fullInfoSportsman"><?php
                            echo $infoSpShort[1];
                            ?></span>
                    </a>
                </div>
                <?php
                $j++;
            } ?>

        </div>
    </div>

    <div class="video">
        <div class="videoTitle">
            <h3>Видео</h3>

            <div class="aVideoMore">
                <a href="https://www.youtube.com/channel/UChCTZGrWFyi79X0jKEny9xg/videos?flow=grid&view=0&sort=dd"
                   target="_blank">Больше
                    видео на нашем канале &rarr;</a>
            </div>
        </div>
        <hr>
        <div class="videos">
            <iframe src="https://www.youtube.com/embed/q0up7k63_bI" frameborder="0" allow="autoplay; encrypted-media"
                    allowfullscreen></iframe>
            <iframe src="https://www.youtube.com/embed/q-7rIKg39LE" frameborder="0" allow="autoplay; encrypted-media"
                    allowfullscreen></iframe>
            <iframe src="https://www.youtube.com/embed/gmJ6ZFkCzLo" frameborder="0" allow="autoplay; encrypted-media"
                    allowfullscreen></iframe>
        </div>
    </div>


</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>

<script src="../../modules/owlcarousel/owl.carousel.min.js"></script>
<script src="../../modules/lightbox/js/lightbox.js"></script>
<script src="../../scripts/galleryScript.js"></script>