<?php
echo $this->Html->script('details.js');
?>

<div>
    <h3 class="text-center"><b><?php echo $data_post['title']; ?></b></h3>
    <div class="text-center">
        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
        <span class="color808080"><?php echo $data_post['create_date']; ?></span> <br></div>

    <div class="text-center margin10">
        <span class="glyphicon glyphicon-tags margin-right10"></span>
        <?php foreach ($data_post->categories as $row) : ?>
            <span class="border-category">
            <a href="http://localhost/blogg/category-info?category_id=<?php echo $row['id'] ?> ">
            <?php echo $row['name'] ?>
            </a>
        </span>
        <?php endforeach; ?>
    </div>

    <div class=" text-center">
        <img src="<?php echo $data_post['image_post']; ?>">
    </div>
    <div class="content-detail"><?php echo $data_post['content']; ?></div>
</div>


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this->Html->css('slider.css') ?>
</head>
<div id="same_topic" class="bottom50">
    <div>
        <hr class="wid90">
        <h3><b class="margin-title-same-topic">Same Topic</b></h3>
        <div class="container-fluid container-fluid-css">
            <div class="row">
                <!-- Item slider-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                                <div class="carousel-inner">
                                <?php foreach ($data_category->posts as $same) : ?>
                                    <div>
                                        <div class="col-xs-12 col-sm-6 col-md-2">
                                            <a href="http://localhost/blogg/details?id_post=<?php echo $same['id']?>"><img
                                                        src=<?php echo $same['image_post'] ?>
                                                        class="img150"></a>
                                            <h5 class="text-center"><?php echo $same['title']?></h5>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                                <!-- left,right control -->
                                <div id="slider-control">
                                    <a class="left carousel-control" href="#itemslider" data-slide="prev"><img
                                                src="http://localhost/hello_cakephp/img/arrow_left.png" alt="Left"
                                                class="img-responsive"></a>
                                    <a class="right carousel-control" href="#itemslider" data-slide="next"><img
                                                src="http://localhost/hello_cakephp/img/arrow_right.png" alt="Right"
                                                class="img-responsive"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item slider end-->
            </div>
        </div>
    </div>
</div>

