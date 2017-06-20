<section class="featured">

    <div class="column row">
        <hr>
        <h2>Latest Phone Repair Shops</h2>
    </div>

    <div class="row">

        <?php //debug($venues->toArray() ); ?>

        <?php foreach($venues as $venue): ?>

            <div class="column small-12 large-3 medium-6 flex-container">
                <div class="card align-stretch store-card">
                    <a href="<?php echo $venue['slug']?>">
                        <div class="card-divider text-center ">
                            <h4><?php echo h($venue['name']);?></h4>
                        </div>
                        <img class="card-image" src="/assets/img/placeholder-555.png">
                        <div class="card-section text-center">
                            <p>
                                <?php echo h($venue['address']);?><br>
                                <?php echo h($venue['phone']);?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>


        <!--
        <div class="column small-12 large-3 medium-6 flex-container">
            <div class="card align-stretch store-card">
                <a href="/profile.html">
                    <div class="card-divider text-center ">
                        <h4>iPhone Repair</h4>
                    </div>
                    <img class="card-image" src="/assets/img/placeholder-555.png">
                    <div class="card-section text-center">
                        <p>
                            123 College St., Toronto<br>
                            416-123-1234
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="column small-12 large-3 medium-6 flex-container">
            <div class="card align-stretch store-card">
                <a href="/profile.html">
                    <div class="card-divider text-center ">
                        <h4>Android Repairs</h4>
                    </div>
                    <img class="card-image" src="/assets/img/placeholder-555-bw.jpg">
                    <div class="card-section text-center">
                        <p>
                            123 College St., Toronto<br>
                            416-123-1234
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="column small-12 large-3 medium-6 flex-container">
            <div class="card align-stretch store-card">
                <a href="/profile.html">
                    <div class="card-divider text-center ">
                        <h4>BlackBerry Repairs <small class="nowrap">(Eaton Centre)</small></h4>
                    </div>
                    <img class="card-image" src="/assets/img/placeholder-555-bw.jpg">
                    <div class="card-section text-center">
                        <p>
                            123 College St., Toronto<br>
                            416-123-1234
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="column small-12 large-3 medium-6 flex-container">
            <div class="card align-stretch">
                <div class="card-divider text-center">
                    <h4>HTC Repair 2</h4>
                </div>
                <img class="card-image" src="http://lorempixel.com/555/415/">
                <div class="card-section text-left">
                    <p>
                        <i class="fa fa-map-marker"></i> 123 College St., Toronto<br>
                        <i class="fa fa-phone"></i> 416-123-1234</p>
                </div>
            </div>
        </div>

        -->

    </div>
</section>