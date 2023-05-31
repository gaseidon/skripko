<?
include 'nav.php';
include '..\controllers\connect.php';
$stmt_prod = $conn->prepare("SELECT * FROM prod LIMIT 5");
$stmt_prod->execute();
$products = $stmt_prod->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="/css/index.css">

<body>

    <div class="container_top">
        <picture><img src="/img/logo1024.png" alt="logo"></picture>
        <div class="slogan">
            <span>Задача организации, в особенности же высокое качество позиционных исследований однозначно определяет
                каждого участника как способного принимать собственные решения касаемо новых предложений. Также как
                постоянное информационно-пропагандистское обеспечение нашей деятельности не даёт нам иного выбора, кроме
                определения приоретизации разума над эмоциями. Высокий уровень вовлечения представителей целевой
                аудитории является четким доказательством простого факта: убеждённость некоторых оппонентов позволяет
                выполнить важные задания по разработке первоочередных требований.</span>
        </div>
    </div>

    <?

    include 'slider.php';

    ?>

</body>

<script src="/js/slider.js"></script>