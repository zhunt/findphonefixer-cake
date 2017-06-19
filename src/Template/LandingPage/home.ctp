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
<footer class="marketing-site-footer">
    <div class="row medium-unstack align-middle">
        <div class="medium-8 columns">
            <h4 class="marketing-site-footer-name">FindPhoneFixer</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita dolorem accusantium architecto id quidem, itaque nesciunt quam ducimus atque.</p>

        </div>
        <div class="medium-4 columns">
            <h4 class="marketing-site-footer-title">Contact Info</h4>
            <div class="marketing-site-footer-block">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <p>298 Dundas St.<br>Toronto, Canada</p>
            </div>
            <div class="marketing-site-footer-block">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p>1 (800) 555-5555</p>
            </div>
            <div class="marketing-site-footer-block">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <p>zhunt@yyztech.ca</p>
            </div>
        </div>

    </div>
    <div class="marketing-site-footer-bottom">
        <div class="row large-unstack align-middle">
            <div class="column">
                <p>&copy; 2017 YYZtech Group Media Ltd.</p>
            </div>
            <div class="column">
                <ul class="menu marketing-site-footer-bottom-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Works</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- partials/findphonefixer-footer.html end -->


