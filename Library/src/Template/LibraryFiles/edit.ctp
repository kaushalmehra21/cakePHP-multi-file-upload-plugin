<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $libraryFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $libraryFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Library Files'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="libraryFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($libraryFile) ?>
    <fieldset>
        <legend><?= __('Edit Library File') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('name', ['type'=>'hidden']);
            echo $this->Form->control('type', ['type'=>'hidden']);
            echo $this->Form->control('size', ['type'=>'hidden']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
