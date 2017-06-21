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
        <h1><?php echo h($city['name']) ?> Cell Phone Repair and Parts</h1>
    </div>
</section>


<!-- latest -->
<!-- partials/city-featured.html start -->
<?php $cell = $this->cell('LatestVenues', [ 'city' => 1] ); echo $cell; ?>
<!-- partials/city-featured.html end -->


<!-- alt neighbouhood section -->
<section class="neighbourhoods-list">
    <div class="row column">

        <div class="card" >
            <div class="card-divider ">
                <h3>Neighbourhoods in <?php echo h($city['seo_title']) ?></h3>
            </div>
            <div class="card-section text-left">

                <div class="row">
                    <div class="large-12 columns">
                        <ul class="menu expanded align-left">
                            <li><a href="/cities-list.html">Annex</a></li>
                            <li><a href="/city-page.html">Karlyn FioriniAnnex</a></li>
                            <li><a href="/city-page.html">ALauralee Studernnex</a></li>
                            <li><a href="/city-page.html">Annex Speller</a></li>
                            <li><a href="/city-page.html">Gayle Depaul Annex</a></li>
                            <li><a href="/city-page.html">AnnexRaphael</a></li>

                            <li><a href="/city-page.html">Raphael Annex</a></li>
                            <li><a href="/city-page.html">Annex</a></li>
                            <li><a href="/city-page.html">Kourtney Annex</a></li>
                            <li><a href="/city-page.html">Annex</a></li>
                            <li><a href="/city-page.html">Verlie MeadorAnnex</a></li>
                            <li><a href="/city-page.html">Annex</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>



<!-- store types, e.g. repair, parts, training schools, etc. -->
<section class="neighbourhoods-list">
    <div class="row column">

        <div class="card" >
            <div class="card-divider ">
                <h3>Phone Services in <?php echo h($city['name']) ?></h3>
            </div>
            <div class="card-section text-left">
                <div class="row">
                    <div class="large-12 columns">
                        <ul class="menu expanded align-left">
                            <li><a href="/city-page.html">Cases</a></li>
                            <li><a href="/city-page.html">Phone Repair</a></li>
                            <li><a href="/city-page.html">Phone Parts</a></li>
                            <li><a href="/city-page.html">Training Schools</a></li>
                        </ul>
                    </div>
                </div>
</section>

<!-- store types, e.g. repair, parts, training schools, etc. -->
<section class="neighbourhoods-list">
    <div class="row column">

        <div class="card" >
            <div class="card-divider ">
                <h3>Phone Repair Chains in <?php echo h($city['name']) ?></h3>
            </div>
            <div class="card-section text-left">
                <div class="row">
                    <div class="large-12 columns">
                        <ul class="menu expanded align-left">
                            <li><a href="/city-page.html">Bell</a></li>
                            <li><a href="/city-page.html">iRepair</a></li>
                            <li><a href="/city-page.html">Rogers</a></li>
                            <li><a href="/city-page.html">iFixer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
</section>

<!-- blogs / lists for this city -->

<!-- partials/feature-blogs.html start -->
<?php $cell = $this->cell('LatestBlogs', ['city' => 1 ]); echo $cell; ?>
<!-- partials/feature-blogs.html end -->


<!-- footer -->

<!-- partials/findphonefixer-footer.html start -->
<?php echo $this->element('footer'); ?>
<!-- partials/findphonefixer-footer.html end -->




