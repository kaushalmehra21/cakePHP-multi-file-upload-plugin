<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Library Setting'), ['action' => 'edit', $librarySetting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Library Setting'), ['action' => 'delete', $librarySetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $librarySetting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Library Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Library Setting'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="librarySettings view large-9 medium-8 columns content">
    <h3><?= h($librarySetting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Plugin Key') ?></th>
            <td><?= h($librarySetting->plugin_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plugin Value') ?></th>
            <td><?= h($librarySetting->plugin_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($librarySetting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($librarySetting->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($librarySetting->modified) ?></td>
        </tr>
    </table>
</div>
