<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\CityRegion[]|\Cake\Collection\CollectionInterface $cityRegions
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New City Region'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cityRegions index large-9 medium-8 columns content">
    <h3><?= __('City Regions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seo_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cityRegions as $cityRegion): ?>
            <tr>
                <td><?= $this->Number->format($cityRegion->id) ?></td>
                <td><?= h($cityRegion->name) ?></td>
                <td><?= h($cityRegion->display_name) ?></td>
                <td><?= h($cityRegion->slug) ?></td>
                <td><?= h($cityRegion->seo_title) ?></td>
                <td><?= $cityRegion->has('city') ? $this->Html->link($cityRegion->city->name, ['controller' => 'Cities', 'action' => 'view', $cityRegion->city->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cityRegion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cityRegion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cityRegion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityRegion->id)]) ?>
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
