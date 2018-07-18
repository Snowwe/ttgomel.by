<link rel="stylesheet" href="../css/headerStyle.css">
<link rel="stylesheet" href="../css/searchStyle.css">

<div class="header-container">
    <div class="contact">
        <div class="contactTel">
            <img src="../images/header/tel_header.png" class="imgTel" alt="">
            +375 29 7312124
        </div>
        <div class="contactAddress">
            <img src="../images/header/adr_header.png" class="imgAddress" alt="">
            г.Гомель, ул.Рабочая, 22
        </div>
    </div>

    <div class="logo">
        <a href="http://ttgomel.by/index.php?page=main">
            <img src="../images/header/logo.png" class="imgLogo"/>
        </a>
    </div>

<!--    <form name="search" method="post" action="search/index.php">-->
<!--        <input type="search" name="query" placeholder="Поиск">-->
<!--        <input type="submit" value="Найти">-->
<!--    </form>-->

    <div class="search">
        <form action="http://ttgomel.by/index.php?page=search" method="post" id="search" class="search">
            <input type="search" name="query" placeholder="Поиск по сайту" onblur="if(this.value=='')
                    this.value='Поиск по сайту';" onfocus="if(this.value=='Поиск по сайту')
                        this.value='';" class="input" />
            <input type="submit" name="" value="" class="submit" />
        </form>
    </div>
</div>
