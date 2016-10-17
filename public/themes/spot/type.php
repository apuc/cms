<?php get_header() ?>
<div id="blue">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
                <h4>WE WORK HARD TO ACHIEVE EXCELLENCE</h4>
                <p>AND WE ARE HAPPY TO DO IT</p>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!--  bluewrap -->
<?php prn($records); ?>
<div class="container desc">
    <?php foreach($records->get_records() as $record): ?>
        <div class="row">
            <br><br>
            <div class="col-lg-6 centered">
                <img src="<?= $record->photo ?>" alt="">
            </div><!-- col-lg-6 -->
            <div class="col-lg-6">
                <h4><?= $record->title ?></h4>
                <?= $record->content ?>
                <!--<p>
                    <i class="fa fa-circle-o"></i> Mobile Design<br/>
                    <i class="fa fa-circle-o"></i> Web Design<br/>
                    <i class="fa fa-circle-o"></i> Development<br/>
                    <i class="fa fa-link"></i> <a href="#">BlackTie.co</a>
                </p>-->
            </div>
        </div><!-- row -->

        <br><br>
        <hr>
    <?php endforeach; ?>
</div><!-- container -->


<div id="r">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
                <h4>WE ARE STORYTELLERS. BRANDS ARE OUR SUBJECTS. DESIGN IS OUR VOICE.</h4>
                <p>We believe ideas come from everyone, everywhere. At BlackTie, everyone within our agency walls is a designer in their own right. And there are a few principles we believe—and we believe everyone should believe—about our design craft. These truths drive us, motivate us, and ultimately help us redefine the power of design.</p>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><! -- r wrap -->
<?php get_footer(); ?>