<?php snippet('header');
    snippet('oauth');
    $token = getToken();
    $update_type = filter_input(INPUT_POST, "type");
    $action = filter_input(INPUT_POST, "update");
    $id = filter_input(INPUT_POST, "ID");?>
<main class="main">
    <?php if (!$kirby->user()): ?>
    <section class="page-section bg-yellow">
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12">
                   <h2 class="section-title">User Message: You must be logged in to remove name entries. </h2>
                </div>
            </div>
        </div>
    </section>
    <?php else : ?>
    <section class="page-section">
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12">
                   <p class="red-text">Note: Once you delete an entry it cannot be recovered.</p><br>
                   <a href="#departures" class="section-title">> Skip to Departures</a><br><br>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section mod-result">
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    if ($update_type == 'arrival'){
                        snippet('arrivals-update', ['token'=>$token, 'action'=>$action, 'ID'=>$id]);
                    } elseif ($update_type == 'departure'){
                        snippet('departures-update', ['token'=>$token, 'action'=>$action, 'ID'=>$id]);
                    } ?>
                </div>
            </div>
        </div>
    </section>

    <section id="arrivals" class="page-section moderation-forms arrival-moderation">
        <div class="wrapper">
            <?php snippet('arrivals-removal', ['token'=>$token]) ?>
        </div>
    </section>

    <section id="departures" class="page-section moderation-forms arrival-moderation">
        <div class="wrapper">
            <?php snippet('departures-removal', ['token'=>$token]) ?>
        </div>
    </section>

    <?php endif; ?>
</main>

<?php snippet('footer');?>
