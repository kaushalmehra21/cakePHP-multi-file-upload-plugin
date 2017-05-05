<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Library File'), ['action' => 'edit', $libraryFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Library File'), ['action' => 'delete', $libraryFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libraryFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Library Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Library File'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="libraryFiles view large-9 medium-8 columns content">
    <h3><?= h($libraryFile->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($libraryFile->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($libraryFile->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($libraryFile->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($libraryFile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= $this->Number->format($libraryFile->size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($libraryFile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($libraryFile->modified) ?></td>
        </tr>
    </table>
    <div class="libraryFiles view large-12 medium-12 columns content">
        <?= $this->cell('Library.FileOriginal::display', [$libraryFile->id]) ?>
    </div>
</div>
