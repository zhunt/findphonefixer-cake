<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue[]|\Cake\Collection\CollectionInterface $venues
 */


//debug($venues->toArray());
?>
<!-- profile.html -->
<!-- partials/header-inside.html start -->
<?php echo $this->element('insideHeader'); ?>
<!-- partials/header-inside.html end -->

<section class="featured">
    <div class="column row">
        <hr>
        <h2>Search for...</h2>
    </div>
</section>

<section class="search-results">
    <?php foreach ($venues as $venue): ?>
    <div class="row">
        <div class="small-12 column">
            <a href="/venue/<?php echo $venue->slug; ?>">
                <div class="card card-product horizontal">
                    <div class="card-section large-2 small-4 medium-4">
                        <img class="" src="/assets/img/placeholder-555.png" alt="">
                    </div>
                    <div class="card-section medium-8 small-8">
                        <h4><?= h($venue->name . ' ' . $venue->sub_name ) ?></h4>
                        <p><?= h($venue->prefered_address) ?></p>
                        <p><span class="label"><?php echo h($venue->venue_types{0}->name); ?></span></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php endforeach; ?>

</section>

<div class="paginator">
    <ul class="pagination text-center" role="navigation" aria-label="Pagination">

        <?php // echo $this->Paginator->first('<< ' . __('first')) ?>
        <?php echo $this->Paginator->prev( __('previous')) ?>
        <?php echo $this->Paginator->numbers() ?>
        <?php echo $this->Paginator->next(__('next') ) ?>
        <?php // echo $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p class="text-center"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>

<!-- partials/findphonefixer-footer.html start -->
<?php echo $this->element('footer'); ?>
<!-- partials/findphonefixer-footer.html end -->


<!--
<ul class="pagination text-center" role="navigation" aria-label="Pagination">
    <li class="pagination-previous disabled">Previous</li>
    <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
    <li><a href="#" aria-label="Page 2">2</a></li>
    <li><a href="#" aria-label="Page 3">3</a></li>
    <li><a href="#" aria-label="Page 4">4</a></li>
    <li class="ellipsis"></li>
    <li><a href="#" aria-label="Page 12">12</a></li>
    <li><a href="#" aria-label="Page 13">13</a></li>
    <li class="pagination-next"><a href="#" aria-label="Next page">Next</a></li>
</ul>
-->



