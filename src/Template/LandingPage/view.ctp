<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\LandingPage $landingPage
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Landing Page'), ['action' => 'edit', $landingPage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Landing Page'), ['action' => 'delete', $landingPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $landingPage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Landing Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Landing Page'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="landingPages view large-9 medium-8 columns content">
    <h3><?= h($landingPage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($landingPage->path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seo Title') ?></th>
            <td><?= h($landingPage->seo_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($landingPage->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Seo Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($landingPage->seo_desc)); ?>
    </div>
</div>
