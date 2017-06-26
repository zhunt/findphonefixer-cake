<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\CityRegion $cityRegion
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City Region'), ['action' => 'edit', $cityRegion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City Region'), ['action' => 'delete', $cityRegion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityRegion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List City Regions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City Region'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cityRegions view large-9 medium-8 columns content">
    <h3><?= h($cityRegion->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($cityRegion->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display Name') ?></th>
            <td><?= h($cityRegion->display_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($cityRegion->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seo Title') ?></th>
            <td><?= h($cityRegion->seo_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $cityRegion->has('city') ? $this->Html->link($cityRegion->city->name, ['controller' => 'Cities', 'action' => 'view', $cityRegion->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cityRegion->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Seo Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($cityRegion->seo_desc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venues') ?></h4>
        <?php if (!empty($cityRegion->venues)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Sub Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Seo Title') ?></th>
                <th scope="col"><?= __('Seo Desc') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Display Address') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Website') ?></th>
                <th scope="col"><?= __('Photos') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Hours Holiday') ?></th>
                <th scope="col"><?= __('Hours Mon') ?></th>
                <th scope="col"><?= __('Hours Tue') ?></th>
                <th scope="col"><?= __('Hours Wed') ?></th>
                <th scope="col"><?= __('Hours Thu') ?></th>
                <th scope="col"><?= __('Hours Fri') ?></th>
                <th scope="col"><?= __('Hours Sat') ?></th>
                <th scope="col"><?= __('Hours Sun') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Province Id') ?></th>
                <th scope="col"><?= __('City Region Id') ?></th>
                <th scope="col"><?= __('Geo Latt') ?></th>
                <th scope="col"><?= __('Geo Long') ?></th>
                <th scope="col"><?= __('Admin Level 2') ?></th>
                <th scope="col"><?= __('Flag Is Mall') ?></th>
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
            <?php foreach ($cityRegion->venues as $venues): ?>
            <tr>
                <td><?= h($venues->id) ?></td>
                <td><?= h($venues->name) ?></td>
                <td><?= h($venues->sub_name) ?></td>
                <td><?= h($venues->slug) ?></td>
                <td><?= h($venues->seo_title) ?></td>
                <td><?= h($venues->seo_desc) ?></td>
                <td><?= h($venues->address) ?></td>
                <td><?= h($venues->display_address) ?></td>
                <td><?= h($venues->city_id) ?></td>
                <td><?= h($venues->phone) ?></td>
                <td><?= h($venues->website) ?></td>
                <td><?= h($venues->photos) ?></td>
                <td><?= h($venues->description) ?></td>
                <td><?= h($venues->hours_holiday) ?></td>
                <td><?= h($venues->hours_mon) ?></td>
                <td><?= h($venues->hours_tue) ?></td>
                <td><?= h($venues->hours_wed) ?></td>
                <td><?= h($venues->hours_thu) ?></td>
                <td><?= h($venues->hours_fri) ?></td>
                <td><?= h($venues->hours_sat) ?></td>
                <td><?= h($venues->hours_sun) ?></td>
                <td><?= h($venues->country_id) ?></td>
                <td><?= h($venues->province_id) ?></td>
                <td><?= h($venues->city_region_id) ?></td>
                <td><?= h($venues->geo_latt) ?></td>
                <td><?= h($venues->geo_long) ?></td>
                <td><?= h($venues->admin_level_2) ?></td>
                <td><?= h($venues->flag_is_mall) ?></td>
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
