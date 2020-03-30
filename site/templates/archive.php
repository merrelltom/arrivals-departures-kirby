<?php snippet('header') ?>

    <main class="main">
        <div class="board-section">
            <div class="wrapper">
                
                <div class="col-xs-12 col-lg-6">
                    
                    <header class="board-header">
                        <h2 class="board-title">Arrivals</h2>
                    </header>
                    <div class="xs-hide md-show" aria-hidden="true">
                        <span class="board-column-heading" >Date</span><span class="board-column-heading">Name</span>
                    </div>
                    <ol class="names-list">
                        <?php snippet('arrivals-archive');?>
                    </ol>
                
                </div>
                
                <div class="col-xs-12 col-lg-6">
                    
                    <header class="board-header">
                        <h2 class="board-title">Departures</h2>
                    </header>
                    <div class="xs-hide md-show" aria-hidden="true">
                        <span class="board-column-heading" >Date</span><span class="board-column-heading">Name</span>
                    </div>
                    <ol class="names-list">
                       <?php snippet('departures-archive');?>
                    </ol>
                
                </div>

            </div>
        
        </div>