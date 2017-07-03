<?php
/**
  * @var \App\View\AppView $this
  */
?>


        <div class="row">

            <nav class="column shrink" id="ac/tions-sidebar">
                <ul class="si/de-nav">
                    <li class="he/ading"><?= __('Actions') ?></li>
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

            <div class="column">

    <?= $this->Form->create($venue, ['type' => 'file'] ) ?>
    <fieldset>
        <legend><?= __('Edit Venue') ?></legend>
        <?php

        //echo $this->Form->control('filename', ['value']);

        ?>
        <div class="callout">
            <div class="row">
                <div class="column">
                    <?php echo  $this->Form->control('name'); ?>
                </div>
                <div class="column">
                    <?php echo  $this->Form->control('sub_name'); ?>
                </div>
                <div class="column">
                    <?php echo  $this->Form->control('slug');; ?>
                </div>
            </div>
        </div>

        <div class="callout">
            <div class="row">
                <div class="column">
                    <?php echo $this->Form->control('seo_title'); ?>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <?php echo $this->Form->control('seo_desc', ['type'=> 'text']); ?>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <?php echo $this->Form->control('description'); ?>
                </div>
            </div>
        </div>

        <div class="callout">
            <fieldset>
                <legend>JSON Fields</legend>
                <div class="row">
                    <div class="column">
                        <?php echo $this->Form->control('phone', ['type' => 'textarea']);?>
                    </div>

                    <div class="column">
                        <?php echo $this->Form->control('website', ['type' => 'textarea']); ?>
                    </div>
                    <div class="column">
                        <?php echo $this->Form->control('photos'); ?>
                    </div>
                </div>
                <div class="row column">
                    <?php echo $this->Form->control('upload_image_file', ['type' =>  'file']); ?>
                </div>
            </fieldset>
        </div>

        <div class="callout">
            <fieldset>
                <legend>Hours</legend>

                <div class="row">
                    <div class="column">
                        <?php echo $this->Form->control('hours_mon'); ?>
                    </div>
                    <div class="column">
                        <?php echo $this->Form->control('hours_tue'); ?>
                    </div>
                    <div class="column">
                        <?php echo $this->Form->control('hours_wed'); ?>
                    </div>
                    <div class="column">
                        <?php echo $this->Form->control('hours_thu'); ?>
                    </div>
                </div>
                <div class="row">

                    <div class="column">
                        <?php echo $this->Form->control('hours_fri'); ?>
                    </div>
                    <div class="column">
                        <?php echo $this->Form->control('hours_sat'); ?>
                    </div>
                    <div class="column">
                        <?php echo $this->Form->control('hours_sun'); ?>
                    </div>
                    <div class="column">
                        <?php echo $this->Form->control('hours_holiday'); ?>
                    </div>
                </div>

            </fieldset>
        </div>

        <div class="callout">
            <div class="row align-middle">
                <div class="columns ">
                    <?php echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true]); ?>
                </div>
                <div class="columns ">
                    <?php echo $this->Form->control('province_id', ['options' => $provinces, 'empty' => true]); ?>
                </div>
                <div class="columns">
                    <?php echo $this->Form->control('city_id', ['options' => $cities]); ?>
                </div>
                <div class="columns ">
                    <?php echo $this->Form->control('city_region_id', ['options' => $cityRegions, 'empty' => true]); ?>
                </div>
            </div>
        </div>



        <div class="callout">
            <div class="row">
                <div class="column">
                    <?php echo $this->Form->control('address', ['type' => 'text']); ?>
                </div>
                <div class="column">
                    <?php  echo $this->Form->control('display_address'); ?>
                </div>
            </div>
            <div class="row align-middle">
                <div class="columns large-4 small-12">
                    <?php echo $this->Form->control('geo_latt', ['type' => 'text']); ?>
                </div>
                <div class="columns large-4 small-12">
                    <?php echo $this->Form->control('geo_long', ['type' => 'text']); ?>
                </div>
            </div>
            <div class="row column">
                <?php echo $this->Form->control('admin_level_2'); ?>
            </div>
        </div>


        <div class="callout">
            <div class="row align-middle">
                <div class="columns large-4 small-12">
                    <?php echo $this->Form->control('chain_id', ['options' => $chains, 'empty' => true]); ?>
                </div>
                <div class="columns large-4 small-12 text-right">
                    <?php echo $this->Form->control('flag_is_mall'); ?>
                </div>
                <div class="columns large-4 small-12">
                    <?php echo $this->Form->control('mall_id', ['options' => $malls, 'empty' => true]); ?>
                </div>
            </div>
        </div>


        <?php  //echo $this->Form->control('last_update', ['empty' => true]);
        //echo $this->Form->control('flag_featured');
        // echo $this->Form->control('rating'); ?>



        <div class="callout">
            <fieldset>
                <legend>Features / Amenities </legend>

                <div class="row align-middle">
                    <div class="columns large-4 small-12">
                        <?php echo $this->Form->control('amenities._ids', ['options' => $amenities]); ?>
                    </div>
                    <div class="columns large-4 small-12">
                        <?php echo $this->Form->control('brands._ids', ['options' => $brands]); ?>
                    </div>
                    <div class="columns large-4 small-12">
                        <?php echo $this->Form->control('cuisines._ids', ['options' => $cuisines]); ?>
                    </div>
                </div>

                <div class="row align-middle">
                    <div class="columns large-4 small-12">
                        <?php echo $this->Form->control('languages._ids', ['options' => $languages]); ?>
                    </div>
                    <div class="columns large-4 small-12">
                        <?php echo $this->Form->control('products._ids', ['options' => $products]); ?>
                    </div>
                    <div class="columns large-4 small-12">
                        <?php echo $this->Form->control('services._ids', ['options' => $services]); ?>
                    </div>
                </div>
                <div class="row align-middle">
                    <div class="columns large-4 small-12">
                        <?php echo $this->Form->control('venue_types._ids', ['options' => $venueTypes]); ?>
                    </div>
                </div>
        </div>

    </fieldset>


    <div class="callout">

        <?php echo $this->Form->control('flag_published'); ?>

        <?php  echo $this->Form->control('last_update', ['empty' => true]); ?>

        <?= $this->Form->button(__('Submit')) ?>

        <?= $this->Form->end() ?>
    </div>

</div>
