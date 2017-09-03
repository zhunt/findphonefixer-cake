
<!-- city-page.html -->
<?php
$this->assign('title', $city['seo_title']);
$this->assign('meta_description', $city['seo_desc']);
?>

<?php if (!empty($city['image_path'])):
    $this->start('inlineCSS'); ?>
    <style>
        .hero {
        //background-image: url(/assets/img/city_vancouver.jpg);
            background-image: url(<?php echo $city['image_path']; ?>);
            background-position-y: 40%;
        }
    </style>
    <?php $this->end(); endif; ?>

<!-- partials/header-inside.html start -->
<?php echo $this->element('insideHeader'); ?>
<!-- partials/header-inside.html end -->



<section>
    <div class="row column">
        <h1><?php echo h($city['name']) ?>, <?php echo h($city->province['name']) ?> Cell Phone Repair and Parts</h1>
    </div>
</section>

<!-- latest -->
<!-- partials/city-featured.html start -->
<?php $cell = $this->cell('LatestVenues', [ 'city' => $city->id ] ); echo $cell; ?>



<!-- partials/city-featured.html end -->


<!-- alt neighbouhood section -->
<?php if (!empty($city->city_regions)): ?>
    <section class="neighbourhoods-list">
        <div class="row column">

            <div class="card" >
                <div class="card-divider ">
                    <h3>Neighbourhoods in <?php echo h($city['name'] . ', ' . $city->country['name'] )?></h3>
                </div>
                <div class="card-section text-left">

                    <div class="row">
                        <div class="large-12 columns">
                            <ul class="menu expanded align-left">
                                <?php foreach( $city->city_regions as $region): ?>
                                    <li><a href="/neighbourhood/<?php echo $region['slug'];?>">
                                            <?php if (!empty($region['display_name'])) {
                                                echo h($region['display_name']);
                                            } else {
                                                echo h($region['name']);
                                            }?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <?php echo $this->element('adblockResponsive'); ?>

<?php endif;?>





<!-- store types, e.g. repair, parts, training schools, etc. -->
<?php $cell = $this->cell('CityServices', ['city' => $city->id, 'cityName' => $city['name'], 'citySlug' => $city['slug'] ]); echo $cell; ?>
<!-- store types, e.g. repair, parts, training schools, etc. -->
<?php $cell = $this->cell('CityChains', ['city' => $city->id, 'cityName' => $city['name'], 'citySlug' => $city['slug'] ]); echo $cell; ?>

<?php echo $this->element('adblockResponsive'); ?>

<!-- blogs / lists for this city -->

<!-- partials/feature-blogs.html start -->
<?php $cell = $this->cell('LatestBlogs', [ 'searchParams' => [ 'search' => 'tips', 'orderby' => 'relevance'] ]); echo $cell; ?>
<!-- partials/feature-blogs.html end -->

<?php echo $this->element('adblockResponsive'); ?>

<!-- footer -->

<!-- partials/findphonefixer-footer.html start -->
<?php echo $this->element('footer'); ?>
<!-- partials/findphonefixer-footer.html end -->




