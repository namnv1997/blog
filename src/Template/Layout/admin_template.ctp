<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <?php echo $this->Html->css('admin_styles.css') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
</head>

<div id="container">
    <div id="menu">
        <ul>
            <li><a href="http://localhost/blogg/admin"> Intro </a></li>
            <li><a href="http://localhost/blogg/admin_categories"> Category</a></li>
            <li><a href="http://localhost/blogg/admin_posts"> Post</a></li>
            <li><a href="http://localhost/blogg/admin_comments">Comment</a></li>
        </ul>
    </div>  <!-- menu -->
    <div id="content">
        <?= $this->fetch('content') ?>
    </div><!-- content -->
</div>  <!-- container -->