<div class="col-xl-12">
    <h1><strong>Estado actual de los Simuladores</strong></h1>
    <div class="row">
        <!-- Información simulador 1 -->
        <?php while($sim = $simuladores->fetch_object()): ?>
        <div class="col-sm-4">
            <article class="statistic-box green">              
                <div>
                    <div class="number"><?=$sim->Nombre;?></div>
                    <div class="caption">
                        <div><a href="<?=base_url?>simulador/informacion/<?=$sim->id?>">+ Info</a></div>
                    </div>
                    <div class="percent">
                        <div class="arrow up"></div>
                        <p>15%</p>
                    </div>
                </div>
            </article>
        </div>
        <?php endwhile; ?>
    </div>
    <!--.row-->
</div>
<!--.col-->