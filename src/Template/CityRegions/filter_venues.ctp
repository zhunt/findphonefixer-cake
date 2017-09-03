<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue[]|\Cake\Collection\CollectionInterface $venues
 */


//debug($venues->toArray());

$cityRegion = $venues->first(); //debug($cityRegion);

$cityRegion = $cityRegion->city_region;

$this->assign('title', !empty($cityRegion->display_name) ? $cityRegion->display_name : $cityRegion->name);
$this->assign('meta_description',  !empty($cityRegion->seo_desc) ? $cityRegion->seo_desc : $this->fetch('title') );

$searchTitle = $this->fetch('title');

if ( !empty($this->request->getQuery('page') ) ) {
    $this->assign('title', $this->fetch('title') . ' | ' . $this->request->getQuery('page') );
}

?>

<!-- filter_venues.html -->
<!-- partials/header-inside.html start -->
<?php echo $this->element('insideHeader'); ?>
<!-- partials/header-inside.html end -->

<section class="featured">
    <div class="column row">
        <hr>
        <h2>Stores in <?php echo h($searchTitle); ?></h2>
    </div>
</section>

<section class="search-results">
    <?php foreach ($venues as $i => $venue): ?>
    <div class="row">
        <div class="small-12 column">
            <a href="/venue/<?php echo $venue->slug; ?>">
                <div class="card card-product horizontal">

                <?php if ( !empty($this->Venue->getProfileImage($venue) ) ): ?>
                    <div class="card-section large-2 small-4 medium-4">
                        <img src="<?php echo $this->Venue->getProfileImage($venue) ?>" title="Photo: copyright owner">
                    </div>
                    <div class="card-section medium-8 small-8">
                <?php else: ?>
                    <div class="card-section small-12">
                <?php endif; ?>

                        <h4><?php echo h( $venue->name ); ?>
                            <?php if ($venue->sub_name) { echo '<small>' . h($venue->sub_name) . '</small>'; } ?>
                        </h4>
                        <p><?= h($venue->prefered_address) ?></p>
                        <p>
                            <?php foreach ($venue->venue_types as $type): ?>
                                <span class="label"><?php echo h($type->name); ?></span>&nbsp;
                            <?php endforeach;?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>

        <?php if ($i == 3) { echo $this->element('adblockResponsive'); } ?>


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

<?php echo $this->element('adblockResponsive'); ?>

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



