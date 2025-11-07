<?php
// includes/produtos.php
?>

    <section class="categories">
        <div class="row gy-5">
            <div class="col-12">
                <h2 class="h4 mb-3">Popular</h2>
                <div id="carouselPopular" class="carousel slide" data-bs-ride="carousel" aria-label="Carrossel de livros populares">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center gap-4 flex-wrap">
                                <div class="card shadow-sm" style="width: 13rem;">
                                    <img src="../IMGS/book1.jpg" class="card-img-top" alt="Dom Casmurro">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">Dom Casmurro</h6>
                                        <p class="card-text small text-muted mb-2">Machado de Assis · Romance</p>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <strong class="text-primary">R$45,90</strong>
                                            <a href="produto.php?id=1" class="btn btn-sm btn-outline-primary">Ver</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm" style="width: 13rem;">
                                    <img src="../IMGS/book2.jpg" class="card-img-top" alt="O Pequeno Príncipe">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">O Pequeno Príncipe</h6>
                                        <p class="card-text small text-muted mb-2">Antoine de Saint-Exupéry · Infantojuvenil</p>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <strong class="text-primary">R$39,90</strong>
                                            <a href="produto.php?id=2" class="btn btn-sm btn-outline-primary">Ver</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm" style="width: 13rem;">
                                    <img src="../IMGS/book3.jpg" class="card-img-top" alt="1984">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">1984</h6>
                                        <p class="card-text small text-muted mb-2">George Orwell · Distopia</p>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <strong class="text-primary">R$49,90</strong>
                                            <a href="produto.php?id=3" class="btn btn-sm btn-outline-primary">Ver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPopular" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselPopular" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
            </div>

            <div class="col-12">
                <h2 class="h4 mb-3">Novidades</h2>
                <div id="carouselNovidades" class="carousel slide" data-bs-ride="carousel" aria-label="Carrossel de novidades">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center gap-4 flex-wrap">
                                <div class="card shadow-sm" style="width: 13rem;">
                                    <img src="../IMGS/book4.jpg" class="card-img-top" alt="Livro novidade 1">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">Novo Lançamento A</h6>
                                        <p class="card-text small text-muted mb-2">Autor Exemplo · Gênero</p>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <strong class="text-primary">R$59,90</strong>
                                            <a href="produto.php?id=4" class="btn btn-sm btn-outline-primary">Ver</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm" style="width: 13rem;">
                                    <img src="../IMGS/book5.jpg" class="card-img-top" alt="Livro novidade 2">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">Novo Lançamento B</h6>
                                        <p class="card-text small text-muted mb-2">Autor Exemplo · Gênero</p>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <strong class="text-primary">R$69,90</strong>
                                            <a href="produto.php?id=5" class="btn btn-sm btn-outline-primary">Ver</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm" style="width: 13rem;">
                                    <img src="../IMGS/book6.jpg" class="card-img-top" alt="Livro novidade 3">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">Novo Lançamento C</h6>
                                        <p class="card-text small text-muted mb-2">Autor Exemplo · Gênero</p>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <strong class="text-primary">R$79,90</strong>
                                            <a href="produto.php?id=6" class="btn btn-sm btn-outline-primary">Ver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselNovidades" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselNovidades" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
            </div>

            <div class="col-12">
                <h2 class="h4 mb-3">Em Breve</h2>
                <div id="carouselEmBreve" class="carousel slide" data-bs-ride="carousel" aria-label="Carrossel de livros em breve">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center gap-4 flex-wrap">
                                <div class="card shadow-sm" style="width: 13rem;">
                                    <img src="../IMGS/book7.jpg" class="card-img-top" alt="Livro em breve 1">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">Em Breve A</h6>
                                        <p class="card-text small text-muted mb-2">Autor Exemplo · Gênero</p>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <strong class="text-muted">Em breve</strong>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Avisar-me</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm" style="width: 13rem;">
                                    <img src="../IMGS/book8.jpg" class="card-img-top" alt="Livro em breve 2">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">Em Breve B</h6>
                                        <p class="card-text small text-muted mb-2">Autor Exemplo · Gênero</p>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <strong class="text-muted">Em breve</strong>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Avisar-me</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm" style="width: 13rem;">
                                    <img src="../IMGS/book9.jpg" class="card-img-top" alt="Livro em breve 3">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">Em Breve C</h6>
                                        <p class="card-text small text-muted mb-2">Autor Exemplo · Gênero</p>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <strong class="text-muted">Em breve</strong>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Avisar-me</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselEmBreve" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselEmBreve" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
            </div>
        </div>
</section>
