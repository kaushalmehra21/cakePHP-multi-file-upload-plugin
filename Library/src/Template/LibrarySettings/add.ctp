<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Library Settings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="librarySettings form large-9 medium-8 columns content">
    <?= $this->Form->create($librarySetting) ?>
    <fieldset>
        <legend><?= __('Add Library Setting') ?></legend>
        <?php
            echo $this->Form->control('plugin_key');
            echo $this->Form->control('plugin_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
