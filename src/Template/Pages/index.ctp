<div id="content_area" class="col-md-9">
    <?php echo $this->Html->script('index.js');
    foreach ($data_post as $dp) : ?>
        <div class="div-post row">
            <div class="col-md-4">
                <img src="<?php echo $dp['image_post'] ?>" class="imgPost"/>
            </div>
            <div class="col-md-8">
                <p class="title-post"><?php echo $dp['title'] ?> </p>
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                <span class="span-time"><?php echo $dp['create_date'] ?></span>
                <input type="hidden" id="id_post" name="id_post">
                <p class="text-summary"> <?php echo $dp['summary'] ?></p>
                <button type="button" class="btn btn-info btn-read-more margin-top8" data-id=<?php echo $dp['id']?>>
                    Read More
                </button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div id="sidebar" class="col-md-3">
    <h3><b>Popular Category</h3>
    <hr>
    <?php
    $number = 1;
    foreach ($data_category as $dc) : ?>
        <p><a class="padding10"
              href="http://localhost/blogg/category-info?category_id= <?php echo $dc['id'] ?>">
                <?php echo $number++ . '. ' . $dc['name'] ?>
            </a>
        </p>
    <?php endforeach; ?>
</div>

