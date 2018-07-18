<!--подключаем стили для страницы Главная-->
<link rel="stylesheet" href="../../css/mainStyle.css">

<main>
    <div class="top-container">

    </div>

    <div class="main_1">
        <div class="aboutUs">
            <h3>О нас</h3>
            <p> 4 января 2005 г. введен в эксплуатацию новый зал настольного тенниса, что расположен в г.Гомеле
                ул.Рабочая,
                17. На открытие теннисного зала прибыли: руководство объединения во главе с генеральным директором В. А.
                Жмайликом, председатель и тренерский состав заводского спортклуба, строителей республиканского
                унитарного
                предприятия "СП" представлял директор М. В. Лукьяненко. И, конечно, виновники торжества – учащиеся ДЮСШ
                СК
                "Гомсельмаш", для кого и был построен этот уютный и прекрасный зал площадью 300 кв. м. Теперь здесь
                смогут
                заниматься теннисом не только дети, но и взрослые. Места хватит всем в этом спортзале.</p>
            <p>В клубе есть благотворительный расчетный счет. Реквизиты счета <a
                        href="http://ttgomel.by/index.php?page=contacts" title="Перейти на страницу Контакты">здесь.</a></p>
        </div>

        <div class="newsShort">
            <h3>Новости клуба</h3>
            <?php
            // подключаем скрипт подключения к базе данных
            require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/database.php';
            //вызываем функцию подключения к БД
            $link = db_connect();

            $query = "SELECT title, dateOfNews, id_news
                      FROM news n 
                      ORDER BY n.dateOfNews DESC LIMIT 5";

            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

            if ($result) {
                $rows = mysqli_num_rows($result); // количество полученных строк
                for ($i = 0; $i < $rows; ++$i) {
                    echo "<div class='short_news_item'>";

                    $row = mysqli_fetch_row($result);
                    //  print_r($row);
                    echo "<a href='http://ttgomel.by/index.php?page=fullNews&id=$row[2]' title='Перейти на страницу новости'>";
                    echo "<div class='title_news_item'>$row[0]</div>";
                    echo "</a>";
                    echo "<div class='dateNews'>$row[1] </div>";
                    echo "</div>";
                }
            }
            // закрываем подключение
            mysqli_close($link);
            ?>
        </div>
    </div>

    <div class="main_2">
        <!--        <img src="../../images/main/room_web.gif" alt="" class="imgSportRoom">-->
        <div class="sportRoom">


            <img src="../../images/main/room_web.gif" alt="" class="imgSportRoom">
            <h3>Помещение</h3>
            <p> Общая площадь зального помещения 300 м. кв., имеются раздевалки, туалеты и душевые, на перспективе
                тренажерный зал. Зал оборудован шестью столами Stiga Expert Roller (возможна установка 7-го стола).
                Имеется
                возможность тренироваться с роботом Donic Robopong 2040 и спарринг-партнерами. </p>
        </div>

    </div>

    <div class="main_3">
        <div class="tourney">
            <img src="../../images/main/tourney_web.gif" alt="" class="imgTourney">
            <h3>Турниры</h3>
            <p> В спортивном зале СК "Гомсельмаш" проводится большое количество турниров разного уровня подготовленности
                спортсменов (от любителей до профессионалов) (см.
                <a href="http://ttgomel.by/index.php?page=calendar" title="Перейти на страницу Календарь">календарь турниров</a>). Система
                организации
                турниров предполагает обеспечение каждому участнику максимального количества игр. Любительские и
                профессиональные турниры обсчитываются. Рейтинг клуба СК "Гомсельмаш" можно посмотреть <a
                        href="http://ttgomel.by/index.php?page=rating" title="Перейти на страницу Рейтинг">здесь</a>. Каждый,
                кто
                заявился на турнир – обязан прийти, чтобы не подвести остальных участников и организаторов.
            </p>
        </div>

    </div>


    <div class="main_4">

        <div class="inventory">


            <h3>Инвентарь</h3>
            <img src="../../images/main/inventory_web.gif" alt="" class="imgInventory">
            <p> На рынке существует большое количество ведущих мировых производителей инвентаря по настольному теннису:
                BUTTERFLY, ADIDAS, ANDRO, DHS , YASAKA, XIOM, DONIC, JOOLA, NITTAKU, STIGA, TIBHAR, TSP, DR.NEUBAUER. Во
                все этом многообразии любителям настольного тенниса очень трудно разобраться. Подобрать нужный
                инвентарь, оказать квалифицированную консультацию вам помогут наши тренера (см. <a
                        href="http://ttgomel.by/index.php?page=contacts" title="Перейти на страницу Контакты">контакты</a>) – бесплатно!
            </p>
        </div>
    </div>

</main>


