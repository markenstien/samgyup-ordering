<?php build('content') ?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Menu</h1>
    </div>
</div>
<?php Flash::show() ?>

<div class="container py-5">
    <div class="container text-center">
        <img src="<?php echo _path_upload_get('images/sampg.jpg')?>" alt="">
        <?php echo wDivider(30)?>
        <img src="<?php echo _path_upload_get('images/sizzlers.jpg')?>" alt="">
        <?php echo wDivider(30)?>
        <img src="<?php echo _path_upload_get('images/unliwing.jpg')?>" alt="">
    </div>
</div>

<?php endbuild()?>

<?php build('scripts') ?>
    <script>
        $(document).ready(function(){
            $('#categoryOption').change(function(){
                let categoryId = $(this).val();
                //if changed then fetch the items with such categories
                location.href = '/HomeController/shop/?category_id=' + categoryId;
            });
        });
    </script>
<?php endbuild()?>
<?php loadTo('tmp/landing')?>