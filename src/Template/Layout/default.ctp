<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'FindPhoneFixer.com - find your phone repair spot.';
?>
<!DOCTYPE html>
<html>
<head>
    <?php // $this->Html->charset() ?>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo trim($this->fetch('title')); ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->meta('description', trim($this->fetch('meta_description')) ); ?>

    <?php // $this->Html->css('base.css') ?>
    <?php // $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?php // echo $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/app.css">

    <!-- inline CSS code -->
    <?php echo $this->fetch('inlineCSS'); ?>

</head>
<body>

<?= $this->fetch('content') ?>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDoAxSn-EXf2vJSj3LRH9FIFNyz7JuGf8U"></script>
    <script src="/assets/js/app.js"></script>

    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>

<script>
    $(document).ready(function(){

            var client = algoliasearch("V7S01MILH0", "c95afb6b5bc53306095ea2d647b644d2");
            var index = client.initIndex('site_findphonefixer');

            //initialize autocomplete on search input (ID selector must match)
            $('#aa-search-input').autocomplete(
                {hint: false}, [
                    {
                        source: $.fn.autocomplete.sources.hits(index, { hitsPerPage: 5 }),
                        //value to be displayed in input control after user's suggestion selection
                        displayKey: 'name',
                        //hash of templates used when rendering dataset
                        templates: {
                            header: '<div class="aa-suggestions-category">Players</div>',
                            //'suggestion' templating function used to render a single suggestion
                            suggestion: function(suggestion) {
                                return '<span>' +
                                    suggestion._highlightResult.name.value + '</span><span>' +
                                    suggestion._highlightResult.address.value + '</span>';
                            },
                            empty: '<div class="aa-empty">No matching players</div>'


                        }
                    }
                ]).on('autocomplete:selected', function(event, suggestion, dataset) {
                window.location = 'http://localhost:8085/venue/' + suggestion.venue_slug;
            });
        }
    );
</script>

</body>
</html>
