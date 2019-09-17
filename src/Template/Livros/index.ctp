<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livro[]|\Cake\Collection\CollectionInterface $livros
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Livro'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="livros index large-9 medium-8 columns content">
    <h3><?= __('Livros') ?></h3>
    <?php foreach ($livros as $livro): ?>
    <div class="card col-4">
        <div class="card-body">
            <h5 class="card-title"><?= h($livro->nome) ?></h5>
            <p class="card-text">
                Quantidade de páginas: <?= $this->Number->format($livro->qtd_paginas) ?> <br>
                Gênero: <?= h($livro->genero) ?>
            </p>
            <div class="card-actions"> 
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $livro->ID]) ?> <br>
                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $livro->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $livro->ID)]) ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>
