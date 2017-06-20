<div class="featured-image-block-grid row column">
    <div class="featured-image-block-grid-header">
        <hr>
        <h2>Cities</h2>
        <h4>View Cell Phone Repair in cities.</h4>
    </div>
    <div class="row large-up-4 small-up-2 ">

        <?php foreach( $cities as $city): ?>
            <div class="featured-image-block column">
                <a href="/city/<?php echo $city['slug']?>">
                    <?php if ( !empty($city['image_path']) ): ?>
                        <img src="<?php echo $city['image_path'] ?>"/>
                    <?php else: ?>
                        <img src="/assets/img/city_default.jpg"/>
                    <?php endif;?>
                    <p class="text-center featured-image-block-title"><?php echo h($city['seo_title'])?></p>
                </a>
            </div>
        <?php endforeach; ?>

        <!--
        <div class="featured-image-block column">
            <a href="/city-page.html">
                <img src="/assets/img/city_toronto.jpg"/>
                <p class="text-center featured-image-block-title">Toronto, Canada</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_vancouver.jpg"/>
                <p class="text-center featured-image-block-title">Vancouver, Canada</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_ottawa.jpg"/>
                <p class="text-center featured-image-block-title">Ottawa, Canada</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_halifax.jpg"/>
                <p class="text-center featured-image-block-title">Halifax, Canada</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_montreal.jpg" />
                <p class="text-center featured-image-block-title">Montreal, Canada</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_calgary.jpg"/>
                <p class="text-center featured-image-block-title">Calgary, Canada</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_default.jpg"/>
                <p class="text-center featured-image-block-title">London, Canada</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_default.jpg"/>
                <p class="text-center featured-image-block-title">Kitchener, Canada</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_miami.jpg"/>
                <p class="text-center featured-image-block-title">Miami, USA</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_houston.jpg"/>
                <p class="text-center featured-image-block-title">Houston, USA</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_london.jpg"/>
                <p class="text-center featured-image-block-title">London, UK</p>
            </a>
        </div>
        <div class="featured-image-block column">
            <a href="#">
                <img src="/assets/img/city_manchester.jpg"/>
                <p class="text-center featured-image-block-title">Manchester, UK</p>
            </a>
        </div>
        -->

    </div>
    <div class="row column text-center">
        <b><a href="#">More</a></b>
    </div>
</div>