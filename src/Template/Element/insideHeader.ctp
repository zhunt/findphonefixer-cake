<?php

// use Cake\Utility\Hash;


// debug(  );

 //echo $this->User->welcome();

 echo $this->User->logout();

// echo $this->User->socialLogin('facebook');





?>

<?php //if ($showAdminPanel == true): debug($userId); ?>
<div class="row admin-panel-bar" style="background-color: #607d8b">
    <div class="column">
        <h4>Admin</h4>

    </div>
    <div class="column">
        <?php echo $this->AuthLink->link('List Venues', '/venues/index'); ?>
    </div>

    <div class="column">
        <?php echo  $this->AuthLink->link( 'List Cities', '/cities/index'); ?>
    </div>

    <div class="column">
        <?php echo $this->AuthLink->link('List City-Regions', '/CityRegions/index'); ?>
    </div>

    <div class="column">
        <?php echo $this->AuthLink->link('List Brands', '/brands/index'); ?>
    </div>

    <div class="column">
        <?php echo $this->AuthLink->link('List Chains', '/chains/index'); ?>
    </div>

    <div class="column">
        <?php echo $this->AuthLink->link('List Products', '/products/index'); ?>
    </div>

    <div class="column">
        <?php echo $this->AuthLink->link('List Services', '/services/index'); ?>
    </div>

    <div class="column ">
        <?php echo $this->User->logout; ?>
    </div>

</div>

<?php // endif; ?>

<section class="header">
    <div class="row">
        <div class="columns large-12 align-self-bottom align-self-middle">
            <h4><a href="/"><img src="/assets/img/findphonefixer-logo.png" title="FindPhoneFixer.com" alt="Find Phone Fixer logo">
                    FindPhoneFixer</a></h4>
        </div>
    </div>
</section>

<section class="hero inside-page">
    <div class="columns row search-form">
        <div class="input-group">
            <input class="input-group-field" type="text" placeholder="Enter a place or city to search"/>
            <div class="input-group-button">
                <input type="submit" class="button" value="Search">
            </div>
        </div>
    </div>
</section>