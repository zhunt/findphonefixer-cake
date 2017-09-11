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
                    <p class="text-center featured-image-block-title"><?php echo h($city['name'] . ', ' . $city->country['name'] )?></p>
                </a>
            </div>
        <?php endforeach; ?>

    </div>
    <div class="row column text-center">
        <b><a href="/cities-list/">More</a></b>
    </div>
</div>