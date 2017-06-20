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
                ['action' => 'delete', $venue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Malls'), ['controller' => 'Malls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mall'), ['controller' => 'Malls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chains'), ['controller' => 'Chains', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chain'), ['controller' => 'Chains', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Amenities'), ['controller' => 'Amenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Amenity'), ['controller' => 'Amenities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cuisines'), ['controller' => 'Cuisines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cuisine'), ['controller' => 'Cuisines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venues form large-9 medium-8 columns content">
    <?= $this->Form->create($venue) ?>
    <fieldset>
        <legend><?= __('Edit Venue') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('sub_name');
            echo $this->Form->control('slug');
            echo $this->Form->control('seo_title');
            echo $this->Form->control('seo_desc');
            echo $this->Form->control('address');
            echo $this->Form->control('display_address');
            echo $this->Form->control('city_id', ['options' => $cities]);
            echo $this->Form->control('phone');
            echo $this->Form->control('website');
            echo $this->Form->control('photos');
            echo $this->Form->control('hours_holiday');
            echo $this->Form->control('hours_mon');
            echo $this->Form->control('hours_tue');
            echo $this->Form->control('hours_wed');
            echo $this->Form->control('hours_thu');
            echo $this->Form->control('hours_fri');
            echo $this->Form->control('hours_sat');
            echo $this->Form->control('hours_sun');
            echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true]);
            echo $this->Form->control('province_id', ['options' => $provinces, 'empty' => true]);
            echo $this->Form->control('city_region_id', ['options' => $cityRegions, 'empty' => true]);
            echo $this->Form->control('geo_latt');
            echo $this->Form->control('geo_long');
            echo $this->Form->control('admin_level_2');
            echo $this->Form->control('flag_is_mall');
            echo $this->Form->control('mall_id', ['options' => $malls, 'empty' => true]);
            echo $this->Form->control('chain_id', ['options' => $chains, 'empty' => true]);
            echo $this->Form->control('last_update', ['empty' => true]);
            echo $this->Form->control('flag_featured');
            echo $this->Form->control('rating');
            echo $this->Form->control('flag_published');
            echo $this->Form->control('amenities._ids', ['options' => $amenities]);
            echo $this->Form->control('brands._ids', ['options' => $brands]);
            echo $this->Form->control('cuisines._ids', ['options' => $cuisines]);
            echo $this->Form->control('languages._ids', ['options' => $languages]);
            echo $this->Form->control('products._ids', ['options' => $products]);
            echo $this->Form->control('services._ids', ['options' => $services]);
            echo $this->Form->control('venue_types._ids', ['options' => $venueTypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
