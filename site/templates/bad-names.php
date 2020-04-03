<?php snippet('header'); 
    snippet('oauth');
    $token = getToken();
    $action = filter_input(INPUT_POST, "update");
    $id = filter_input(INPUT_POST, "ID");
?>

<main class="main"> 
    <?php if (!$kirby->user()): ?>
    <section class="page-section bg-yellow">
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12">
                   <h2 class="section-title">User Message: You must be logged in to moderate name entries. </h2>
                </div>
            </div>
        </div>
    </section>
    <?php else : ?>
    <section class="page-section mod-result">
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <?php 
                    if ($action == 'delete'){
                        snippet('bad-name-update', ['token'=>$token, 'ID'=>$id]);
                    } elseif ($action == 'add'){
                        snippet('bad-name-add', ['token'=>$token]);
                    } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section moderation-forms arrival-moderation">
        <div class="wrapper">
            <form method="post" action="./bad-names" class="row moderation-row" id="a-board-line-">
                <div class="col-xs-12"><hr></div>
                <div class="col-xs-12 col-md-2 large-text">
                    <label for="name"><span class="label">Name</span></label>
                    <input type="text" name="bad_name">
                </div>
                <div class="radio-wrapper col-xs-12 col-md-2">
                    <div>
                        <input type="radio" id="arrival" name="type" value="arrival">
                        <label for="arrival"><span class="label">Arrival</span></label>
                    </div>
                </div>
                <div class="radio-wrapper col-xs-12 col-md-2">
                    <div>
                        <input type="radio" id="departure" name="type" value="departure">
                        <label for="departure"><span class="label">Departure</span></label>
                    </div>
                </div>
                <input type="hidden" name="update" value="add">
                <div class="col-xs-12 col-md-2">
                    <input class="lg-button" type="submit" value="Add">
                </div>
            </form>
        </div>
    </section>
    <section class="page-section moderation-forms arrival-moderation">
        <div class="wrapper">
            <?php snippet('bad-name-list', ['token'=>$token]) ?>
        </div>
    </section>
    
    <?php endif; ?>
</main>