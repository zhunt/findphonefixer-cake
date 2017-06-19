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
                ['action' => 'delete', $city->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Malls'), ['controller' => 'Malls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mall'), ['controller' => 'Malls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cities form large-9 medium-8 columns content">
    <?= $this->Form->create($city) ?>
    <fieldset>
        <legend><?= __('Edit City') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('seo_title');
            echo $this->Form->control('seo_desc');
            echo $this->Form->control('image_path');
            echo $this->Form->control('intro_text');
            echo $this->Form->control('flag_show_homepage' );
            echo $this->Form->control('number_venues' );
            echo $this->Form->control('province_id', ['options' => $provinces, 'empty' => true]);
            echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
