<div class="card nearby-venues">

    <div class="card-divider ">
        <h4><i class="fa fa-map-o"></i> Nearby</h4>
    </div>
    <div class="card-section text-left">

        <?php if (!empty($venues)): ?>

        <table>
            <tbody>
            <?php foreach($venues as $venue): ?>
                <tr>
                    <td><h5><a href="/venue/<?php echo $venue->slug; ?>" title="Tech Direct "><?php echo h(trim($venue['name'] . ' ' . $venue['sub_name'])); ?></a></h5>
                        <?php echo h($venue->address); ?> | <em><?php echo h( $venue->venue_types{0}->name); ?></em>
                    </td>
                    <td><?php echo h( $this->Venue->getDistanceInKm($venue->distance) ); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <?php endif; ?>

    </div>

</div>