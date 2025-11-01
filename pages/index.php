<?php
include '../includes/header.php';
?>

<main class="container my-5">
    <section class="text-center mb-5">
        <h1 class="display-4 mb-3">Bem-vindo ao eBooksCloud</h1>
        <p class="lead">A livraria mais original do Brasil. Explore nossa coleção de livros e encontre seu próximo favorito!</p>
    </section>

    <section class="book-collection">
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="../IMGS/book1.jpg" class="card-img-top" alt="Dom Casmurro por Machado de Assis">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Dom Casmurro</h5>
                        <p class="card-text">Um clássico da literatura brasileira por Machado de Assis que explora temas como amor, ciúme e traição.</p>
                        <div class="mt-auto">
                            <p class="h5 mb-3 text-primary">R$ 45,90</p>
                            <a href="produto.php?id=1" class="btn btn-primary w-100">Ver detalhes</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="../IMGS/book2.jpg" class="card-img-top" alt="O Pequeno Príncipe por Antoine de Saint-Exupéry">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">O Pequeno Príncipe</h5>
                        <p class="card-text">Uma história atemporal sobre amor, amizade e o significado da vida, por Antoine de Saint-Exupéry.</p>
                        <div class="mt-auto">
                            <p class="h5 mb-3 text-primary">R$ 39,90</p>
                            <a href="produto.php?id=2" class="btn btn-primary w-100">Ver detalhes</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="../IMGS/book3.jpg" class="card-img-top" alt="1984 por George Orwell">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">1984</h5>
                        <p class="card-text">O clássico distópico de George Orwell que retrata um futuro sombrio sob vigilância constante.</p>
                        <div class="mt-auto">
                            <p class="h5 mb-3 text-primary">R$ 49,90</p>
                            <a href="produto.php?id=3" class="btn btn-primary w-100">Ver detalhes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
include '../includes/footer.php';
?>