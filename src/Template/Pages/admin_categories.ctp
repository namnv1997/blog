<?php
echo $this->Html->script('category.js');
?>
<h2 class="title-style" id="category">CATEGORY MANAGER</h2>
<div class="col-10 col-sm-8">

    <h3>CATEGORY AVAILABLE</h3>
    <div class="row-table">
        <div class="column-table minw30" style="min-width: 30px;">ID</div>
        <div class="column-table minw250">Category Name</div>
    </div>


    <div id="category_display">
        <?php foreach ($info as $row) : ?>
            <div class="row-table" data-id=<?php echo $row['id'] ?> data-name=<?php echo $row['name'] ?>>
                <div class="column-table " style="min-width: 30px;"><?php echo $row['id'] ?></div>
                <div class="column-table minw250"><?php echo $row['name'] ?></div>
                <button type="button" class="btn btn-primary btnUD edit-category" data-toggle="modal"
                        data-target=".edit-category-modal">&nbsp Edit &nbsp
                </button>
                <button class="btn btn-danger btnUD delete-category" data-toggle="modal"
                        data-target=".delete-category-modal">Delete
                </button>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
    echo '<ul class="pagination category-previous">';
    echo '<li class="page-item previous" style="display: none" ><a class="page-link">Previous</a></li>';
    echo '</ul>';
    echo '<ul class="pagination pagination-category">';
    for ($i = 1; $i <= $number_of_pagination; $i++) {
        if ($i == 1) {
            echo '<li><a class="active-me" id="pagi-1" data-max-page="' . $number_of_pagination . '"  data-page="' . $i . '">' . $i . '</a></li>';
        } else {
            echo '<li><a data-page=" ' . $i . '" id="pagi-' . $i . '" data-max-page=" ' . $number_of_pagination . '" >' . $i . '</a></li>';
        }
    }
    echo '</ul>';
    echo '<ul class="pagination category-next">';
    echo '<li class="page-item next" ><a class="page-link" >Next</a></li>';
    echo '</ul>';
    ?>


</div>


<div class="col-10 col-sm-4">
    <h3>ADD NEW CATEGORY</h3>
    <form id="add_category" method="post">
        <input id="category_name" name="category_name" type="text" placeholder="Category Name"
               class="form-control form-box-me">
        <input type="hidden" name="askAdd" value=1>
        <button type="submit" id="btn_add_cate" class="btn btn-lg btn-primary">Add Category</button>
    </form>

    <!-- modal edit -->
    <div class="modal fade edit-category-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form id="edit_category" style="margin: 10px;" method="post">
                    <input id="category_name_edit" name="category_name_edit" class="form-control form-box-me"
                           type="text" placeholder="New category name">
                    <input type="hidden" name="askEdit" value=1>
                    <input type="hidden" id="category_id_edit" name="category_id_edit" value=2>

                </form>
                <div class="btn btn-group margin10">
                    <button id="btn_edit_cate" class="btn btn-info btn-primary center-block">
                        Change
                    </button>
                    <button id="btn_edit_cancel" class="btn center-block"> Cancel</button>
                </div>

            </div>
        </div>
    </div>
    <!-- modal edit -->

    <!-- modal delete -->
    <div class="modal fade delete-category-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form id="delete_category" class="margin10" method="post"
                      action="http://localhost/CoffeWebsite/app/controllers/admin/CategoryController.php?fnc=deleteCategory">
                    <h3 id="tip_delete" class="hidden-me"> Are you sure delete category?</h3>
                    <input type="hidden" name="askDelete" value=1>
                    <input type="hidden" id="category_id_delete" name="category_id_delete" value=2>
                    <div class="btn btn-group margin10 ">
                        <button type="submit" id="btn_delete_cate" class="btn  btn-danger ">
                            Delete
                        </button>
                        <button type="submit" id="btn_delete_cancel" class="btn btn-info center-block"> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal delete -->
</div>
</div>
<br><br><br><br>