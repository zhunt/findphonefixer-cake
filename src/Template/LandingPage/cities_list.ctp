<?php // debug($countryList); ?>
<!-- city-page.html -->
<?php
$this->assign('title', $page['seo_title']);
$this->assign('meta_description', $page['seo_desc']);
?>

<style>

    .menu.feature-cities>li>a {
        display: inline-block;
        text-align: center;
        margin-left: 0;
        padding: 0;
    }

    .menu.feature-cities.many-countries {
        justify-content: space-evenly;
    }

    .menu.feature-cities.single-country li {
        margin-right: 2rem;
    }




</style>

<?php if (!empty($city['image_path'])):
    $this->start('inlineCSS'); ?>
    <!--
    <style>
        .hero {
        //background-image: url(/assets/img/city_vancouver.jpg);
            background-image: url(<?php echo $city['image_path']; ?>);
            background-position-y: 40%;
        }
    </style>
    -->
    <?php $this->end(); endif; ?>

<!-- partials/header-inside.html start -->
<?php echo $this->element('insideHeader'); ?>
<!-- partials/header-inside.html end -->



<section>
    <div class="row column">

        <?php if ( $countryList['single_county'] == true): ?>
            <h1>Cities in <?php echo $countryList[0]['name'] ?></h1>
        <?php else: ?>
            <h1>Cities List</h1>
        <?php endif; ?>


    </div>
</section>

<!-- latest -->
<!-- partials/city-featured.html start -->
<?php //$cell = $this->cell('LatestVenues', [ 'city' => $city->id ] ); echo $cell; ?>



<!-- partials/city-featured.html end -->

<?php foreach ($countryList as $country): //debug($country); ?>

    <?php if (empty($country['provinces']) ) continue; // skip over counties with no provinces - probably means no listings ?>


<section class="neighbourhoods-list">
    <div class="row column">

        <div class="card" >

            <div class="card-divider ">
                <h3><?php echo '<a href="/cities-list/' . $country['slug']. '">' . h($country['name']);?></a></h3>
            </div>


            <?php if ( $countryList['single_county'] == true): ?>

                <div class="card-section text-left">

                    <?php foreach( $country['provinces'] as $province ):?>

                        <hr>
                        <h4><?php echo $province['name'] ?></h4>


                        <div class="row">
                            <div class="large-12 columns">
                                <ul class="menu expanded align-left feature-cities single-country">
                                    <?php foreach ($province['featured'] as $i => $row): ?>
                                        <li>
                                            <?php echo '<a href="/city/' . $row['slug']. '">' .
                                                '<img class="thumbnail" src="' .  $row['image_path'] . '" alt="'.  h($row['name']) . '"/><br>'
                                                . h($row['name']). '</a>'; ?></li>
                                    <?php endforeach;?>
                                </ul>

                                <?php if ( isset($province['big_cities']) ):?>
                                    <ul class="menu expanded align-left">
                                        <?php foreach ($province['big_cities'] as $i => $row): ?>
                                            <li><?php echo '<a href="/city/' . $row['slug']. '">' . h($row['name']). '</a>'; ?></li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endif;?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                <ul class="menu expanded align-left">
                                    <?php foreach ($province['cities'] as $i => $row): ?>
                                        <li><?php echo '<a href="/city/' . $row['slug']. '">' . h($row['name']). '</a>'; ?></li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; // end loop though proince ?>

                </div>

            <?php else: ?>

                <div class="card-section text-left">

                    <?php // foreach( $country['featured'] as $featured ): debug($featured); ?>



                    <div class="row">
                        <div class="large-12 columns">
                            <ul class="menu expanded align-left feature-cities many-countries">
                            <?php foreach ($country['featured'] as $row ): ?>
                                <li>
                                    <?php echo '<a href="/city/' . $row['slug']. '">' .
                                        '<img class="thumbnail" src="' .  $row['image_path'] . '" alt="'.  h($row['name']) . '"/><br>'
                                        . h($row['name']). '</a>'; ?></li>
                            <?php endforeach;?>
                            </ul>



                        </div>
                    </div>

                    <?php // endforeach; // end loop though proince ?>

                </div>

            <?php endif; // check if single/all countries  ?>


        </div> <!-- end card -->

    </div>
</section>




<?php endforeach; ?>




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




