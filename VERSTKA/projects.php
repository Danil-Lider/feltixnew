<?php include 'head.php' ?>
<body>
<div class="wrapper">
    <?php include 'header.php' ?>
    <section class="projects">
        <div class="container">
            <h1 class="projects__title slideInUp">
                Проекты
            </h1>
            <div class="projects__wrap slideInUp-slower">
                <a href="single-project.php" class="projects-card">
                    <img src="public/images/projects/project1.jpg" alt="">
                    <p class="projects-card__title">Офис компании</p>
                </a>
                <a href="single-project.php" class="projects-card">
                    <img src="public/images/projects/project2.jpg" alt="">
                    <p class="projects-card__title">Лофт ресторана “Ле-Бурже”</p>
                </a>
                <a href="single-project.php" class="projects-card">
                    <img src="public/images/projects/project3.jpg" alt="">
                    <p class="projects-card__title">Название проекта
                    </p>
                </a>
                <a href="single-project.php" class="projects-card">
                    <img src="public/images/projects/project4.jpg" alt="">
                    <p class="projects-card__title">Офис компании Фелтикс</p>
                </a>
            </div>
            <div class="products-pagination animated">
                <a href="#" class="products-pagination__link active">1</a>
                <a href="#" class="products-pagination__link">2</a>
                <a href="#" class="products-pagination__link">3</a>
                <a href="#" class="products-pagination__link">4</a>
            </div>
        </div>
    </section>
    <?php include 'footer.php' ?>
