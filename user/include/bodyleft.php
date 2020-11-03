<div class="container1" id="bodyleft">

    <?php if(!isset($_GET['cat_id'])) { ?>

        <div id="slider">
            <h2>Deals Of The Day</h2>
            <img src="../images/slider/a_1.png" alt="">
        </div>

        <ul><?php echo vegetables(); ?></ul><br clear='all' />
        <ul><?php echo meat(); ?></ul><br clear='all' />
        <ul><?php echo fish(); ?></ul><br clear='all' />
        <ul><?php echo rice(); ?></ul><br clear='all' />
        <ul><?php echo gas(); ?></ul><br clear='all' />

    <?php } ?>

</div>
