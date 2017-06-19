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
                ['action' => 'delete', $landingPage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $landingPage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Landing Pages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="landingPages form large-9 medium-8 columns content">
    <?= $this->Form->create($landingPage) ?>
    <fieldset>
        <legend><?= __('Edit Landing Page') ?></legend>
        <?php
            echo $this->Form->control('path');
            echo $this->Form->control('seo_title');
            echo $this->Form->control('seo_desc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
