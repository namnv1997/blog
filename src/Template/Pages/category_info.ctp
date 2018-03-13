<?php
echo $this->Html->script('category-info.js');
?>
<div id="content_area" class="col-md-9">
    <h3 class="color-category">Post list</h3>
    <hr class="bottom50">

    <?php foreach ($data->posts as $row) : ?>
        <div class="div-post row">
            <div class="col-md-4">
                <img src="' . $row['image_post'] . '" class="imgPost"/>
            </div>
            <div class="col-md-8">
                <p class="title-post"> <?php echo $row['title']; ?> </p>
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                <span class="span-time"><?php echo $row['create_date']; ?> </span>
                <input type="hidden" id="id_post" name="id_post">
                <p class="text-summary"> <?php echo $row['summary']; ?> </p>
                <button type="button" class="btn btn-info btn-read-more margin-top8" data-id=<?php echo $row['id']; ?> >Read
                    More
                </button>
            </div>
        </div>
    <?php endforeach; ?>
</div>