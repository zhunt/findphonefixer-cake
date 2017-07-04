<?php if ( !empty($userLoggedIn)): ?>
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

<?php endif; ?>

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


            <div class="aa-input-container" id="aa-input-container">
                <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search for players or teams..." name="search" autocomplete="off" />
            </div>



        </div>
    </div>
</section>