<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livro $livro
 */

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Livros'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="livros form large-9 medium-8 columns content">
    <?= $this->Form->create($livro) ?>
    <fieldset>
        <legend><?= __('Add Livro') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('qtd_paginas');
            echo $this->Form->control('genero_id', array('type'=>'select','options'=>$livro->genero));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
