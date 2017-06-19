<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\LandingPage[]|\Cake\Collection\CollectionInterface $landingPages
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Landing Page'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="landingPages index large-9 medium-8 columns content">
    <h3><?= __('Landing Pages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seo_title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($landingPages as $landingPage): ?>
            <tr>
                <td><?= $this->Number->format($landingPage->id) ?></td>
                <td><?= h($landingPage->path) ?></td>
                <td><?= h($landingPage->seo_title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $landingPage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $landingPage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $landingPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $landingPage->id)]) ?>
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
