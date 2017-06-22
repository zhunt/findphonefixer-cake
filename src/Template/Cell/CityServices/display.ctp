<section class="neighbourhoods-list">
    <div class="row column">

        <div class="card" >
            <div class="card-divider ">
                <h3>Phone Services in <?php echo h($cityName) ?></h3>
            </div>
            <div class="card-section text-left">
                <div class="row">
                    <div class="large-12 columns">
                        <ul class="menu expanded align-left">
                            <?php foreach( $prductsServicesList as $slug => $item):?>
                                <li><a href="/<?php echo $slug; ?>"><?php echo h($item); ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

</section>