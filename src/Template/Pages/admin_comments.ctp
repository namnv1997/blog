<?php
echo $this->Html->script('comment.js');
?>

<h2 id="comment" class="title-style">COMMENT MANGAGER</h2>
<div>
    <h3 class="col-sm-8">COMMENT CONFIRM</h3>
</div>

<div>
    <div class="row-table">
        <div class="column-table text-center" style="width:50px;">
            <b>ID</b>
        </div>
        <div class="column-table text-center" style="width:50px;">
            <p><b>User Id</b></p>
        </div>
        <div class="column-table text-center" style="width:50px;">
            <p><b>Post Id</b></p>
        </div>
        <div class="column-table text-center" style="min-width:550px;">
            <p><b>Comment</b></p>
        </div>
        <div class="column-table text-center" style="width: 80px;">
            <b>Status</b>
        </div>
        <div class="column-table text-center" style="width: 200px;">
            <b>Options</b>
        </div>
    </div>
    <div id="comment_display">
        <?php foreach ($info as $row) : ?>
            <?php if ($row['status'] == 0) {
                $stt = 'Disable';
                $btn_option = '<button class="btn btn-primary cmt-option" value="1" data-id="' . $row['cmt_id'] . '">Enable</button>';
            } else {
                $stt = 'Enable';
                $btn_option = '<button class="btn btn-danger cmt-option" value="0" data-id="' . $row['cmt_id'] . '">Disable</button>';
            } ?>
            <div class="row-table">
                <div class="column-table text-center" style="min-width:50px;">
                    <p><?php echo $row['cmt_id'] ?></p>
                </div>
                <div class="column-table text-center" style="min-width:50px;">
                    <p><?php echo $row['user_id'] ?></p>
                </div>
                <div class="column-table text-center" style="min-width:50px;">
                    <p><?php echo $row['post_id'] ?></p>
                </div>
                <div class="column-table text-center" style="min-width:550px;">
                    <p><?php echo $row['comment'] ?></p>
                </div>
                <div class="column-table text-center" style="width: 80px;">
                    <p><?php echo $stt ?></p>
                </div>
                <div class="column-table text-center" style="width: 200px;">
                    <?php echo $btn_option ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

    <ul class="pagination comment-previous">
        <li class="page-item previous-li-comment" style="display: none"><a class="page-link">Previous</a></li>
    </ul>
    <ul class="pagination pagination-comment">
        <?php for ($i = 1; $i <= $number_of_pagination; $i++) {
            if ($i == 1) {
                echo '<li><a class="active-me-comment" id="pagi-comment-1" data-max-page="' . $number_of_pagination . '"  data-page="' . $i . '">' . $i . '</a></li>';
            } else {
                echo '<li><a data-page=" ' . $i . '" id="pagi-comment-' . $i . '" data-max-page=" ' . $number_of_pagination . '" >' . $i . '</a></li>';
            }
        }
        echo '</ul>';
        echo '<ul class="pagination comment-next">';
        if ($number_of_pagination > 1) {
            echo '<li class="page-item next-li-comment" ><a class="page-link">Next</a></li>';
        }
        echo '</ul>';
        ?>
</div>



