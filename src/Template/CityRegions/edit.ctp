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
                ['action' => 'delete', $cityRegion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cityRegion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List City Regions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cityRegions form large-9 medium-8 columns content">
    <?= $this->Form->create($cityRegion) ?>
    <fieldset>
        <legend><?= __('Edit City Region') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('display_name');
            echo $this->Form->control('slug');
            echo $this->Form->control('seo_title');
            echo $this->Form->control('seo_desc');
            echo $this->Form->control('city_id', ['options' => $cities]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
