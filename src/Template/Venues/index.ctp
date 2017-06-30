<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Venue[]|\Cake\Collection\CollectionInterface $venues
  */
?>
<div class="row">

    <nav class="column shrink">
        <ul >
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?></li>
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
    <h3><?= __('Venues') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('seo_title') ?></th> -->
                <!-- <th scope="col"><?= $this->Paginator->sort('display_address') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <!--
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hours_holiday') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hours_mon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hours_tue') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hours_wed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hours_thu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hours_fri') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hours_sat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hours_sun') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_region_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('geo_latt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('geo_long') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_level_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('flag_is_mall') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mall_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chain_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_update') ?></th>
                <th scope="col"><?= $this->Paginator->sort('flag_featured') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating') ?></th>
                -->
                <th scope="col"><?= $this->Paginator->sort('flag_published') ?></th>
                <!--
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                -->
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venues as $venue): ?>
            <tr>
                <td>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venue->id]) ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venue->slug]) ?>
                </td>
                <td><?= h($venue->name) ?></td>
                <td><?= h($venue->sub_name) ?></td>
                <td><?= h($venue->slug) ?></td>
                <!--
                <td><?= h($venue->seo_title) ?></td>
                <td><?= h($venue->display_address) ?></td>
                -->
                <td><?= $venue->has('city') ? $this->Html->link($venue->city->name, ['controller' => 'Cities', 'action' => 'view', $venue->city->id]) : '' ?></td>
                <!--
                <td><?= h($venue->phone) ?></td>
                <td><?= h($venue->website) ?></td>
                <td><?= h($venue->hours_holiday) ?></td>
                <td><?= h($venue->hours_mon) ?></td>
                <td><?= h($venue->hours_tue) ?></td>
                <td><?= h($venue->hours_wed) ?></td>
                <td><?= h($venue->hours_thu) ?></td>
                <td><?= h($venue->hours_fri) ?></td>
                <td><?= h($venue->hours_sat) ?></td>
                <td><?= h($venue->hours_sun) ?></td>
                <td><?= $venue->has('country') ? $this->Html->link($venue->country->name, ['controller' => 'Countries', 'action' => 'view', $venue->country->id]) : '' ?></td>
                <td><?= $venue->has('province') ? $this->Html->link($venue->province->name, ['controller' => 'Provinces', 'action' => 'view', $venue->province->id]) : '' ?></td>
                <td><?= $venue->has('city_region') ? $this->Html->link($venue->city_region->name, ['controller' => 'CityRegions', 'action' => 'view', $venue->city_region->id]) : '' ?></td>
                <td><?= $this->Number->format($venue->geo_latt) ?></td>
                <td><?= $this->Number->format($venue->geo_long) ?></td>
                <td><?= h($venue->admin_level_2) ?></td>
                <td><?= h($venue->flag_is_mall) ?></td>
                <td><?= $venue->has('mall') ? $this->Html->link($venue->mall->name, ['controller' => 'Malls', 'action' => 'view', $venue->mall->id]) : '' ?></td>
                <td><?= $venue->has('chain') ? $this->Html->link($venue->chain->name, ['controller' => 'Chains', 'action' => 'view', $venue->chain->id]) : '' ?></td>
                <td><?= h($venue->last_update) ?></td>
                <td><?= h($venue->flag_featured) ?></td>
                <td><?= $this->Number->format($venue->rating) ?></td>
                -->
                <td><?= h($venue->flag_published) ?></td>
                <!--
                <td><?= h($venue->created) ?></td>
                -->
                <td><?= h($venue->modified) ?></td>
                <td class="actions">

                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?>
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
