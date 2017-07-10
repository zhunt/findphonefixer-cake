<section class="neighbourhoods-list">
    <div class="row column">

        <div class="card" >
            <div class="card-divider ">
                <h3>Phone Repair Chains in <?php echo h($cityName) ?></h3>
            </div>
            <div class="card-section text-left">
                <div class="row">
                    <div class="large-12 columns">
                        <ul class="menu expanded align-left">
                            <?php foreach( $chains as $slug => $item):?>
                                <li><a href="/search/chain/<?php echo $slug; ?>/<?php echo $citySlug ?>"><?php echo h($item); ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>