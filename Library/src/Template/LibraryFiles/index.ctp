<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Library File'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="libraryFiles index large-9 medium-8 columns content">
    <h3><?= __('Library Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['Item']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libraryFiles as $libraryFile): ?>
            <tr>
                <td><?= $this->Number->format($libraryFile->id) ?></td>
                <td><?= h($libraryFile->title) ?></td>
                <!-- <td><?= h($libraryFile->name) ?></td> -->
                <!-- <td><?= $this->Html->image('library_docs/thumb/'.$libraryFile->name.'.jpg', ['alt' => $libraryFile->title, 'width'=>'50']); ?></td> -->
                <td><?= $this->cell('Library.FileThumb::display', [$libraryFile->id]); ?></td>
                <td><?= h($libraryFile->type) ?></td>
                <td><?= $this->Number->format($libraryFile->size) ?></td>
                <td><?= h($libraryFile->created) ?></td>
                <td><?= h($libraryFile->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $libraryFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $libraryFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $libraryFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libraryFile->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
