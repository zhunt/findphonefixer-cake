<?php
$this->assign('title', 'About Find Phone Fixer');
$this->assign('meta_description', 'FindPhoneFixer is a directory for cell phone repair services. Read our Disclaimer and Privacy Policy.');
?>

    <!-- partials/header-1.html start -->
    <section class="header">
        <div class="row">
            <div class="columns large-12 align-self-bottom align-self-middle">
                <h4><a href="/"><img src="/assets/img/findphonefixer-logo.png" alt="Find Phone Fixer logo"> FindPhoneFixer</a></h4>
            </div>
        </div>
    </section>

    <section>
        <div class="row column">
            <h1>Report Listing Error For: <?php echo h( trim($venue['name'] . ' ' . $venue['sub_name'] ) ); ?></h1>



                <!-- var json = <?php // echo ( isset($jsonData)) ? h(json_encode($jsonData)) : ''; ?> -->

            <p>Please let us know what is wrong on the venue listing for <b><?php echo h( trim($venue['name'] . ' ' . $venue['sub_name'] ) ); ?></b> at <?php echo h($venue['display_address']); ?>:</p>
                <?php

                $this->Form->setTemplates([
                    'nestingLabel' => '{{input}}<label{{attrs}}>{{text}}</label>',
                    'formGroup' => '{{input}}{{label}}',
                ]);

                echo $this->Form->create($contact);
                echo $this->Form->control('venue_id', ['type' => 'hidden', 'value' => $venue['id'] ] );
                echo $this->Form->control('venue_slug', ['type' => 'hidden', 'value' => $venue['slug'] ] );
                echo $this->Form->control('venue_closed', ['label' => "The venue is closed" ] );
                echo $this->Form->control('hours_wrong', ['label' => "The hours are wrong"] );
                echo $this->Form->control('phone_wrong', ['label' => "The phone number or website address is wrong"]);

                // set back to default
                $this->Form->setTemplates([
                    'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',
                    'formGroup' => '{{label}}{{input}}',
                ]);
                echo $this->Form->control('other_error', [ 'type' => 'textarea', 'label' => "Other information", 'placeholder' => "Please enter any addional information here, .e.g. correct hours, phone number, etc." ]);

                echo $this->Form->button('Submit', ['type' => 'submit', 'class' => 'button' ]);

                echo $this->Form->end();
                ?>

        </div>
    </section>

<!-- partials/findphonefixer-footer.html start -->
<?php echo $this->element('footer'); ?>
<!-- partials/findphonefixer-footer.html end -->

