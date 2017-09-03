<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Venue $venue
  */

// debug($venue->toArray());

$this->assign('title', $venue['seo_title']);
$this->assign('meta_description', $venue['seo_desc']);

?>
<!-- profile.html -->
<!-- partials/header-inside.html start -->
<?php echo $this->element('insideHeader'); ?>
<!-- partials/header-inside.html end -->

<section class="location-path">
    <div class="row">
        <div class="column ">
            <div class="card">
                <div class="card-section text-left">
                    <nav aria-label="You are here:" role="navigation" class="">
                        <ul class="breadcrumbs">
                            <li><a href="/">Home</a></li>
                            <!-- <li><a href="/country/<?php echo $venue->country->slug;?>"><?php echo h($venue->country->name); ?></a></li> -->
                            <li><?php echo h($venue->country->name); ?></li>
                            <li><a href="/city/<?php echo $venue->city->slug;?>"><?php echo h($venue->city->name); ?></a></li>
                            <?php
                                if (!empty($venue->city_region->name )){
                                    if ( !empty($venue->city_region->display_name ) ) {
                                        echo '<li><a href="/neighbourhood/' . $venue->city_region->slug . '">' . $venue->city_region->display_name . '</a></li>';
                                    } else {
                                        echo '<li><a href="/neighbourhood/' . $venue->city_region->slug . '">' . $venue->city_region->name . '</a></li>';
                                    }

                                }
                            ?>
                            <li><?php echo h($venue['name']); ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row columns venue-title">
    <div class="card">
        <div class="card-section text-left">
            <h1><?php
                echo h($venue['name']);
                if ( !empty($venue['sub_name'])) {
                   echo ' <small class="no-wrap">'. h($venue['sub_name']) .'</small>';
                }
            ?></h1>

            <p><b>
                    <?php
                        if ( !empty($venue->city_region->prefered_name) ) {
                            echo "<a href=\"/city_venues/{$venue->city->slug}\" title='Show all stores in city'>" . h($venue->city_region->prefered_name) . '</a>';
                        } else {
                            echo "<a href=\"/city_venues/{$venue->city->slug}\" title='Show all stores in city'>" . h($venue->city->name) . '</a>';
                        }
                    ?>
                    |
                    <?php echo h($this->Venue->getVenuesTypes($venue)); ?></b></p>
        </div>

    </div>
</div>

<?php echo $this->element('adblockResponsive'); ?>

<div class="row">

    <div class="columns small-12 medium-4 flex-container ">
        <div class="card profile-picture">
            <img src="<?php echo $this->Venue->getProfileImage($venue, ['force_default_image' => true ]) ?>" title="Photo: copyright owner">
            <div class="card-section text-center">
                <p>
                    <small><i>Photo: <?php echo h($venue['name']);?></i></small>
                </p>
                <p><b><?php echo h($venue->prefered_address);?></b></p>
                <p><b><?php echo h($this->Venue->getFirstPhonenumber($venue));?></b></p>
                <p><b><?php echo h($this->Venue->getFirstWebsite($venue));?></b></p>

                <!--
                <button type="button" style="cursor: pointer" data-toggle="example-dropdown"><p>More...</p></button>
                <div class="dropdown-pane" id="example-dropdown" data-dropdown data-auto-focus="true">
                    <p><b>Facebook</b></p>
                    <p><b>Twitter</b></p>
                    <p><b>Toll-Free</b></p>
                </div>
                -->

            </div>
        </div>
    </div>

    <div class="columns small-12 medium-8 large-8 flex-container">
        <div class="card venue-description">
            <div class="card-section">
                <h4>About <?php echo h($venue['name']);?></h4>
                <?php echo $this->Text->autoParagraph( trim($venue['description']));?>


                <!-- if a mall, list stores in mall here-->
                <!--
                <b>Stores in Mall:</b>
                <div class="row small-up-1 large-up-3 medium-up-2 align-left">
                    <div class="columns"><a href="#">BANANA REPUBLIC MEN</a></div>
                    <div class="columns"><a href="#">Joe Fresh</a></div>
                    <div class="columns"><a href="#">Tommy Hillfigur</a></div>
                    <div class="columns"><a href="#">Banana republic</a></div>
                    <div class="columns"><a href="#">BELL</a></div>
                    <div class="columns"><a href="#">Tommy Hillfigure</a></div>
                    <div class="columns"><a href="#">Banana republic</a></div>
                    <div class="columns"><a href="#">BANANA REPUBLIC MEN</a></div>
                    <div class="columns"><a href="#">Tommy Hillfigure</a></div>
                </div>
                <hr>
                -->

                <?php if ( !empty($venue->services) ): ?>
                <b>Services:</b>
                <p>
                    <?php
                        foreach ($venue->services as $i => $row) {
                            echo '<a href="/search/service/' . $row['slug'] . '/' . $venue->city->slug . '"><span class="label">' . h($row['name']) . '</span></a>' . "\n";
                        } ?>
                </p>
                <?php endif; ?>

                <?php if ( !empty($venue->products) ): ?>
                <b>Products</b>
                <p>
                    <?php
                        foreach ($venue->products as $i => $row) {
                            echo '<a href="/search/product/' . $row['slug'] . '/' . $venue->city->slug . '"><span class="label">' . h($row['name']) . '</span></a>' . "\n";
                        } ?>
                </p>
                <?php endif; ?>

                <?php if ( !empty($venue->brands) ): ?>
                    <b>Brands</b>
                    <p>
                        <?php
                            foreach ($venue->brands as $i => $row) {
                                echo '<a href="/search/brand/' . $row['slug'] . '/' . $venue->city->slug . '"><span class="label">' . h($row['name']) . '</span></a>' . "\n";
                            } ?>
                    </p>
                <?php endif; ?>


                <?php if ( !empty($venue->languages) ): ?>
                    <b>Languages Spoken</b>
                    <p>
                        <?php
                            foreach ($venue->languages as $i => $row) {
                                echo '<a href="/search/language/' . $row['slug'] . '/' . $venue->city->slug . '"><span class="label">' . h($row['native_name']) . '</span></a>' . "\n";
                            } ?>
                    </p>
                <?php endif; ?>

            </div>

            <div class="card-section">
                <hr>
                <div class="row unstack-medium">
                    <div class="column">
                        <i>Last updated:
                            <?php if ( !empty($venue->last_update) ) {
                                echo $this->Time->format($venue->last_update);
                            } else {
                                echo $this->Time->format($venue->created);
                            } ?></i>
                    </div>
                    <div class="column text-right shrink">
                        <b><a href="#" data-open="reportErrorModal">Report Error</a></b>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="columns small-12 medium-8 large-12">
        <div class="card profile-map">
            <script>
                var geoCord = {
                    "latt": <?php echo $venue->geo_latt ?>,
                    "long": <?php echo $venue->geo_long ?>,
                    "venue_name": "<?php echo $venue->name ?>",
                    "venue_address": "<?php echo $venue->prefered_address ?>"
                };
            </script>
            <div class="card-section text-center">
                <div id="profile-map">MAP</div>
                <p><b><?php echo '<a href="https://www.google.ca/maps?q=' . urlencode($venue->prefered_address) . '" title="View on Google Maps" >' . h($venue->prefered_address) ?></a></b></p>
            </div>
        </div>

    </div>


    <!-- hours -->
    <div class="columns small-12 medium-4 large-12">
        <div class="card venue-hours">

            <div class="card-divider ">
                <h4><i class="fa fa-clock-o"></i> Hours</h4>
            </div>

            <div class="row large-unstack medium-unstack card-section text-center">
                <div class="column"><p class="day_1"><b>Mon</b><br><?php echo h($venue->hours_mon); ?></p></div>
                <div class="column"><p class="day_2"><b>Tue</b><br><?php echo h($venue->hours_tue); ?></p></div>
                <div class="column"><p class="day_3"><b>Wed</b><br><?php echo h($venue->hours_wed); ?></p></div>
                <div class="column"><p class="day_4"><b>Thu</b><br><?php echo h($venue->hours_thu); ?></p></div>
                <div class="column"><p class="day_5"><b>Fri</b><br><?php echo h($venue->hours_fri); ?></p></div>
                <div class="column"><p class="day_6"><b>Sat</b><br><?php echo h($venue->hours_sat); ?></p></div>
                <div class="column"><p class="day_0"><b>Sun</b><br><?php echo h($venue->hours_sun); ?></p></div>
            </div>

        </div>

    </div>

</div>


<div class="row">

    <?php $cell = $this->cell('Sponsors'); echo $cell; ?>


    <div class="columns small-12 large-8">
        <!-- nearby -->
        <?php $cell = $this->cell('NearbyVenues', ['venueId' => $venue->id, 'geoLatt' => $venue->geo_latt, 'geoLong' => $venue->geo_long]); echo $cell; ?>
        <!-- nearby end -->
    </div>

</div>


<!-- nearby -->
<?php echo $this->element('adblockResponsive'); ?>

<hr>

<div class="reveal" id="reportErrorModal" data-reveal>

    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>

    <h3>Report Error</h3>

    <form data-abide novalidate>
        <div data-abide-error class="alert callout" style="display: none;">
            <p><i class="fi-alert"></i> There are some errors in your form.</p>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <input type="checkbox" name="pokemon" value="closed" id="bizClosed"><label for="bizClosed">Business
                    Closed</label>
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <input type="checkbox" name="pokemon" value="hoursWrong" id="hoursWrong"><label for="hoursWrong">Hours
                    Wrong</label>
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <textarea required pattern="alpha_numeric" placeholder="Hours..."></textarea>
            </div>
            <p class="help-text" id="">Please Enter correct hours if you know them.</p>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <input type="checkbox" name="pokemon" value="addressWrong" id="addressWrong"><label for="addressWrong">Address
                    Wrong</label>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <textarea required pattern="alpha_numeric" placeholder="Hours..."></textarea>
            </div>
            <p class="help-text" id="">Please Enter correct address if you know it.</p>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <input type="checkbox" name="pokemon" value="contactWrong" id="contactWrong"><label for="contactWrong">Contact
                    Information Wrong</label>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <textarea required pattern="alpha_numeric" placeholder="Hours..."></textarea>
            </div>
            <p class="help-text" id="">Please Enter correct contact info. if you know it.</p>
        </div>


        <div class="row">
            <div class="small-12 columns">
                <input type="checkbox" name="pokemon" value="otherWrong" id="otherWrong"><label
                        for="otherWrong">Other</label>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                    <textarea required pattern="alpha_numeric" rows="5"
                              placeholder="Please enter a description of problem"></textarea>
            </div>
        </div>

        <div class="row">
            <fieldset class="large-6 columns">
                <button class="button" type="submit" value="Submit">Submit</button>
            </fieldset>
            <fieldset class="large-6 columns">
                <button class="button" type="reset" value="Reset">Reset</button>
            </fieldset>
        </div>
    </form>
</div>


<!-- footer -->
<!-- partials/findphonefixer-footer.html start -->
<?php echo $this->element('footer'); ?>
<!-- partials/findphonefixer-footer.html end -->



<?php /* ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Venue'), ['action' => 'edit', $venue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Venue'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Malls'), ['controller' => 'Malls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mall'), ['controller' => 'Malls', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chains'), ['controller' => 'Chains', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chain'), ['controller' => 'Chains', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Amenities'), ['controller' => 'Amenities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Amenity'), ['controller' => 'Amenities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cuisines'), ['controller' => 'Cuisines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cuisine'), ['controller' => 'Cuisines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="venues view large-9 medium-8 columns content">
    <h3><?= h($venue->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($venue->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Name') ?></th>
            <td><?= h($venue->sub_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($venue->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seo Title') ?></th>
            <td><?= h($venue->seo_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display Address') ?></th>
            <td><?= h($venue->display_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $venue->has('city') ? $this->Html->link($venue->city->name, ['controller' => 'Cities', 'action' => 'view', $venue->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($venue->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Website') ?></th>
            <td><?= h($venue->website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Holiday') ?></th>
            <td><?= h($venue->hours_holiday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Mon') ?></th>
            <td><?= h($venue->hours_mon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Tue') ?></th>
            <td><?= h($venue->hours_tue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Wed') ?></th>
            <td><?= h($venue->hours_wed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Thu') ?></th>
            <td><?= h($venue->hours_thu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Fri') ?></th>
            <td><?= h($venue->hours_fri) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Sat') ?></th>
            <td><?= h($venue->hours_sat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Sun') ?></th>
            <td><?= h($venue->hours_sun) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $venue->has('country') ? $this->Html->link($venue->country->name, ['controller' => 'Countries', 'action' => 'view', $venue->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= $venue->has('province') ? $this->Html->link($venue->province->name, ['controller' => 'Provinces', 'action' => 'view', $venue->province->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City Region') ?></th>
            <td><?= $venue->has('city_region') ? $this->Html->link($venue->city_region->name, ['controller' => 'CityRegions', 'action' => 'view', $venue->city_region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin Level 2') ?></th>
            <td><?= h($venue->admin_level_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mall') ?></th>
            <td><?= $venue->has('mall') ? $this->Html->link($venue->mall->name, ['controller' => 'Malls', 'action' => 'view', $venue->mall->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chain') ?></th>
            <td><?= $venue->has('chain') ? $this->Html->link($venue->chain->name, ['controller' => 'Chains', 'action' => 'view', $venue->chain->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($venue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Geo Latt') ?></th>
            <td><?= $this->Number->format($venue->geo_latt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Geo Long') ?></th>
            <td><?= $this->Number->format($venue->geo_long) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rating') ?></th>
            <td><?= $this->Number->format($venue->rating) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Update') ?></th>
            <td><?= h($venue->last_update) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($venue->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($venue->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Flag Is Mall') ?></th>
            <td><?= $venue->flag_is_mall ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Flag Featured') ?></th>
            <td><?= $venue->flag_featured ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Flag Published') ?></th>
            <td><?= $venue->flag_published ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Seo Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($venue->seo_desc)); ?>
    </div>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($venue->address)); ?>
    </div>
    <div class="row">
        <h4><?= __('Photos') ?></h4>
        <?= $this->Text->autoParagraph(h($venue->photos)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Amenities') ?></h4>
        <?php if (!empty($venue->amenities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->amenities as $amenities): ?>
            <tr>
                <td><?= h($amenities->id) ?></td>
                <td><?= h($amenities->name) ?></td>
                <td><?= h($amenities->slug) ?></td>
                <td><?= h($amenities->created) ?></td>
                <td><?= h($amenities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Amenities', 'action' => 'view', $amenities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Amenities', 'action' => 'edit', $amenities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Amenities', 'action' => 'delete', $amenities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amenities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Brands') ?></h4>
        <?php if (!empty($venue->brands)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->brands as $brands): ?>
            <tr>
                <td><?= h($brands->id) ?></td>
                <td><?= h($brands->name) ?></td>
                <td><?= h($brands->slug) ?></td>
                <td><?= h($brands->created) ?></td>
                <td><?= h($brands->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Brands', 'action' => 'view', $brands->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Brands', 'action' => 'edit', $brands->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Brands', 'action' => 'delete', $brands->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brands->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cuisines') ?></h4>
        <?php if (!empty($venue->cuisines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->cuisines as $cuisines): ?>
            <tr>
                <td><?= h($cuisines->id) ?></td>
                <td><?= h($cuisines->name) ?></td>
                <td><?= h($cuisines->slug) ?></td>
                <td><?= h($cuisines->created) ?></td>
                <td><?= h($cuisines->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cuisines', 'action' => 'view', $cuisines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cuisines', 'action' => 'edit', $cuisines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cuisines', 'action' => 'delete', $cuisines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cuisines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Languages') ?></h4>
        <?php if (!empty($venue->languages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Native Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->languages as $languages): ?>
            <tr>
                <td><?= h($languages->id) ?></td>
                <td><?= h($languages->name) ?></td>
                <td><?= h($languages->native_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Languages', 'action' => 'view', $languages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Languages', 'action' => 'edit', $languages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Languages', 'action' => 'delete', $languages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $languages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($venue->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->slug) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Services') ?></h4>
        <?php if (!empty($venue->services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->services as $services): ?>
            <tr>
                <td><?= h($services->id) ?></td>
                <td><?= h($services->name) ?></td>
                <td><?= h($services->slug) ?></td>
                <td><?= h($services->created) ?></td>
                <td><?= h($services->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Services', 'action' => 'view', $services->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Services', 'action' => 'edit', $services->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Services', 'action' => 'delete', $services->id], ['confirm' => __('Are you sure you want to delete # {0}?', $services->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venue Types') ?></h4>
        <?php if (!empty($venue->venue_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->venue_types as $venueTypes): ?>
            <tr>
                <td><?= h($venueTypes->id) ?></td>
                <td><?= h($venueTypes->name) ?></td>
                <td><?= h($venueTypes->slug) ?></td>
                <td><?= h($venueTypes->created) ?></td>
                <td><?= h($venueTypes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VenueTypes', 'action' => 'view', $venueTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VenueTypes', 'action' => 'edit', $venueTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VenueTypes', 'action' => 'delete', $venueTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php */ ?>
