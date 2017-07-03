<section class="featured">

    <?php
    $cityName = null;

    if ($showCityName) {
        $temp = $venues->all()->first();
        if ( !empty($temp) ) {
            $cityName = $temp->city->name;
            $citySlug = $temp->city->slug;
        }
    }
    ?>

    <div class="column row">
        <hr>
        <h2>Latest Phone Repair Shops <?php if (!empty($cityName)) echo h( 'in ' . $cityName); ?></h2>
    </div>

    <div class="row">

        <?php foreach($venues as $venue): ?>

            <div class="column small-12 large-3 medium-6 flex-container">
                <div class="card align-stretch store-card">
                    <a href="<?php echo '/venue/' . $venue['slug']?>">
                        <div class="card-divider text-center ">
                            <h4><?php echo h($venue['name']);?>
                                <?php if (!empty($venue['sub_name']) ): ?>
                                    <small class="nowrap"><?php echo h($venue['sub_name']);?></small>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <img src="<?php echo $this->Venue->getProfileImage($venue) ?>" title="Photo: copyright owner">

                        <div class="card-section text-center">
                            <p>
                                <?php echo h($venue->prefered_address);?>
                                <br>
                                <?php echo h( $this->Venue->getFirstPhonenumber($venue) );?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>


    </div>

<?php if ( !empty( $cityName)): ?>
    <div class="column row">
        <div class="text-right">
            <a href="/city_venues/<?php echo $citySlug;?>">All</a>
        </div>
    </div>
    <hr>
<?php endif;?>

</section>
