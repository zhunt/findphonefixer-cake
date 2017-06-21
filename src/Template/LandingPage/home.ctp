<!-- index.html -->

<!-- partials/header-1.html start -->
<section class="header">
    <div class="row">
        <div class="columns large-12 align-self-bottom align-self-middle">
            <h4><a href="/"><img src="/assets/img/findphonefixer-logo.png" alt="Find Phone Fixer logo"> FindPhoneFixer</a></h4>
        </div>
    </div>
</section>

<section class="hero">
    <div class="columns row text-center">
        <img src="/assets/img/findphonefixer-logo.png" class="logo slow almost-hidden" id="homepage-logo" title="FindPhoneFixer.com" alt="Find Phone Fixer logo" >
    </div>
    <div class="columns row search-form">
        <div class="input-group">
            <input class="input-group-field" type="text" placeholder="Enter a place or city to search">
            <div class="input-group-button">
                <input type="submit" class="button" value="Search">
            </div>
        </div>
    </div>
</section>
<!-- partials/header-1.html end -->

<section>
    <div class="row column">
        <h1>Find Phone Fixer</h1>
    </div>
</section>

<!-- Cities list -->
<section class="other-cities-list">
    <!-- partials/cities-block-grid.html start -->
    <?php $cell = $this->cell('CitiesList'); echo $cell; ?>
    <!-- partials/cities-block-grid.html end -->
</section>

<!-- Blog -->

<!-- partials/feature-blogs.html start -->
<?php $cell = $this->cell('LatestBlogs'); echo $cell; ?>
<!-- partials/feature-blogs.html end -->

<!-- latest -->
<!-- partials/city-featured.html start -->
<?php $cell = $this->cell('LatestVenues'); echo $cell; ?>
<!-- partials/city-featured.html end -->

<!-- footer -->

<!-- partials/findphonefixer-footer.html start -->
<?php echo $this->element('footer'); ?>
<!-- partials/findphonefixer-footer.html end -->


