<section class="featured">

    <?php
    $cityName = null;

    if ($showCityName) {
        $temp = $venues->all()->first();
        if ( !empty($temp) ) {
            $cityName = $temp->city['name'];
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
                    <a href="<?php echo $venue['slug']?>">
                        <div class="card-divider text-center ">
                            <h4><?php echo h($venue['name']);?>
                                <?php if (!empty($venue['sub_name']) ): ?>
                                    <small class="nowrap"><?php echo h($venue['sub_name']);?></small>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <?php if (!empty($venue['photos'])): ?>
                            <img class="card-image" src="<?php echo $venue['photos'] ?>">
                        <?php else: ?>
                            <img class="card-image" src="/assets/img/placeholder-555.png">
                        <?php endif; ?>
                        <div class="card-section text-center">
                            <p>
                                <?php if (!empty($venue['display_address'])):?>
                                    <?php echo h($venue['display_address']);?>
                                <?php else: ?>
                                    <?php echo h($venue['address']);?>
                                <?php endif; ?>
                                <br>
                                <?php echo h( $this->PhoneNumber->firstNumber($venue['phone']) );?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

</section>
