<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livro $livro
 * 
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livro'), ['action' => 'edit', $livro->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livro'), ['action' => 'delete', $livro->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $livro->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Livros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livro'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livros view large-9 medium-8 columns content">
    <h3><?= h($livro->ID) ?></h3>
    
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($livro->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($livro->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qtd Paginas') ?></th>
            <td><?= $this->Number->format($livro->qtd_paginas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Genero') ?></th>
            <td><?= $this->Number->format($livro->id_genero) ?></td>
        </tr>
    </table>
</div>
