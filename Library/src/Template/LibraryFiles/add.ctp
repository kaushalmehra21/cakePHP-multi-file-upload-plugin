<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Library Files'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="libraryFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($libraryFile, ['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Library File') ?></legend>
        <?php
            $option = [
                'label'=>'Upload Files', 
                'type'=>'file', 
                'required' => true,
                'multiple' => true
            ];
            echo $this->Form->control('file[]', $option);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
