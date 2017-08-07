<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">

    <nav class="column shrink" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
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

    <div class="column">

        <div class="row column">
            <div class="callout">
                <fieldset>
                    <legend>Venue CSV File To Use:</legend>
                    <?= $this->Form->create($venue, ['type' => 'file', 'url' => ['action' => 'loadCsvFileVenues'] ] ) ?>
                    <div class="row align-middle">
                        <div class="columns large-6 small-12">
                            <label>Filename (CSV)
                                <?php echo $this->Form->control('csv_file', ['type' => 'file', 'label' => false, 'div' => false]); ?>
                            </label>
                        </div>
                        <!--
                        <div class="columns large-2 small-12">
                            <label>Offset Row
                                <?php echo $this->Form->control('file_offset', ['type' => 'text', 'placeholder' => 0, 'label' => false, 'div' => false]); ?>
                            </label>
                        </div>
                        -->
                        <div class="columns text-right">
                            <?= $this->Form->button(__('Submit', [  'label' => false, 'div' => false ]) ) ?>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </fieldset>
            </div>
        </div>

    </div>

</div>

