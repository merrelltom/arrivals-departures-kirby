<?php snippet('header') ?>

    <main class="main">
        <div class="board-section">
            <div class="wrapper">
                
                <article id="arrivals-board" class="board">
                    
                    <header class="board-header">
                        <h2 class="board-title">Arrivals</h2>
                    </header>
                    <div class="xs-hide md-show" aria-hidden="true">
                        <span class="board-column-heading" >Date</span><span class="board-column-heading">Name</span>
                    </div>
                    <ol class="names-list">
                        <?php snippet('arrivals-archive');?>
                    </ol>
                
                </article>
                
                <article id="departures-board" class="board">
                    
                    <header class="board-header">
                        <h2 class="board-title">Departures</h2>
                    </header>
                    <div class="xs-hide md-show" aria-hidden="true">
                        <span class="board-column-heading" >Date</span><span class="board-column-heading">Name</span>
                    </div>
                    <ol class="names-list">
                       <?php snippet('departures-archive');?>
                    </ol>
                
                </article>

            </div>
        
        </div>