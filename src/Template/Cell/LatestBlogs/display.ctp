<section class="featured">

    <div class="column row">
        <hr>
        <h2>Latest Blog News</h2>
    </div>

    <div class="row">

        <?php foreach( $blogs as $blog): ?>
        <div class="columns large-4 medium-6 small-12 flex-container">
            <div class="card blog-card">
                <a href="<?php echo $blog['url']; ?>">
                    <?php if ( !empty( $blog['image'])): ?>
                        <img class="card-image" src="<?php echo $blog['image']; ?>">
                    <?php else: ?>
                        <img class="card-image" src="/assets/img/placeholder-555-bw.jpg">
                    <?php endif; ?>
                    <div class="card-section text-left">
                        <h4><a href="<?php echo $blog['url']; ?>"><?php echo $blog['title']; ?></a></h4>
                        <p>
                            <?php echo h($blog['text']); ?>
                            <a href="<?php echo $blog['url']; ?>">Read More</a>
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</section>