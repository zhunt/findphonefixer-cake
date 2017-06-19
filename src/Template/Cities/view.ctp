<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\City $city
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Malls'), ['controller' => 'Malls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mall'), ['controller' => 'Malls', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cities view large-9 medium-8 columns content">
    <h3><?= h($city->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($city->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seo Title') ?></th>
            <td><?= h($city->seo_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seo Desc') ?></th>
            <td><?= h($city->seo_desc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= $city->has('province') ? $this->Html->link($city->province->name, ['controller' => 'Provinces', 'action' => 'view', $city->province->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $city->has('country') ? $this->Html->link($city->country->name, ['controller' => 'Countries', 'action' => 'view', $city->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Image Path') ?></h4>
        <?= $this->Text->autoParagraph(h($city->image_path)); ?>
    </div>
    <div class="row">
        <h4><?= __('Intro Text') ?></h4>
        <?= $this->Text->autoParagraph(h($city->intro_text)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related City Regions') ?></h4>
        <?php if (!empty($city->city_regions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Seo Title') ?></th>
                <th scope="col"><?= __('Seo Desc') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->city_regions as $cityRegions): ?>
            <tr>
                <td><?= h($cityRegions->id) ?></td>
                <td><?= h($cityRegions->name) ?></td>
                <td><?= h($cityRegions->slug) ?></td>
                <td><?= h($cityRegions->seo_title) ?></td>
                <td><?= h($cityRegions->seo_desc) ?></td>
                <td><?= h($cityRegions->city_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CityRegions', 'action' => 'view', $cityRegions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CityRegions', 'action' => 'edit', $cityRegions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CityRegions', 'action' => 'delete', $cityRegions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityRegions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Malls') ?></h4>
        <?php if (!empty($city->malls)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Seo Title') ?></th>
                <th scope="col"><?= __('Seo Desc') ?></th>
                <th scope="col"><?= __('Intro Text') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->malls as $malls): ?>
            <tr>
                <td><?= h($malls->id) ?></td>
                <td><?= h($malls->name) ?></td>
                <td><?= h($malls->slug) ?></td>
                <td><?= h($malls->seo_title) ?></td>
                <td><?= h($malls->seo_desc) ?></td>
                <td><?= h($malls->intro_text) ?></td>
                <td><?= h($malls->city_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Malls', 'action' => 'view', $malls->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Malls', 'action' => 'edit', $malls->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Malls', 'action' => 'delete', $malls->id], ['confirm' => __('Are you sure you want to delete # {0}?', $malls->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venues') ?></h4>
        <?php if (!empty($city->venues)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Seo Title') ?></th>
                <th scope="col"><?= __('Seo Desc') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Phones') ?></th>
                <th scope="col"><?= __('Websites') ?></th>
                <th scope="col"><?= __('Photos') ?></th>
                <th scope="col"><?= __('Location Hours') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Province Id') ?></th>
                <th scope="col"><?= __('City Region Id') ?></th>
                <th scope="col"><?= __('Geo Latt') ?></th>
                <th scope="col"><?= __('Geo Long') ?></th>
                <th scope="col"><?= __('Admin Level 2') ?></th>
                <th scope="col"><?= __('Flag Mall') ?></th>
                <th scope="col"><?= __('Mall Id') ?></th>
                <th scope="col"><?= __('Chain Id') ?></th>
                <th scope="col"><?= __('Last Update') ?></th>
                <th scope="col"><?= __('Flag Featured') ?></th>
                <th scope="col"><?= __('Rating') ?></th>
                <th scope="col"><?= __('Flag Published') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->venues as $venues): ?>
            <tr>
                <td><?= h($venues->id) ?></td>
                <td><?= h($venues->name) ?></td>
                <td><?= h($venues->slug) ?></td>
                <td><?= h($venues->seo_title) ?></td>
                <td><?= h($venues->seo_desc) ?></td>
                <td><?= h($venues->address) ?></td>
                <td><?= h($venues->city_id) ?></td>
                <td><?= h($venues->phones) ?></td>
                <td><?= h($venues->websites) ?></td>
                <td><?= h($venues->photos) ?></td>
                <td><?= h($venues->location_hours) ?></td>
                <td><?= h($venues->country_id) ?></td>
                <td><?= h($venues->province_id) ?></td>
                <td><?= h($venues->city_region_id) ?></td>
                <td><?= h($venues->geo_latt) ?></td>
                <td><?= h($venues->geo_long) ?></td>
                <td><?= h($venues->admin_level_2) ?></td>
                <td><?= h($venues->flag_mall) ?></td>
                <td><?= h($venues->mall_id) ?></td>
                <td><?= h($venues->chain_id) ?></td>
                <td><?= h($venues->last_update) ?></td>
                <td><?= h($venues->flag_featured) ?></td>
                <td><?= h($venues->rating) ?></td>
                <td><?= h($venues->flag_published) ?></td>
                <td><?= h($venues->created) ?></td>
                <td><?= h($venues->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Venues', 'action' => 'view', $venues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Venues', 'action' => 'edit', $venues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Venues', 'action' => 'delete', $venues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
