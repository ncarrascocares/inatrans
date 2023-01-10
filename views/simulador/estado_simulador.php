<div class="col-xl-12">
    <h1><strong>Estado actual de los Simuladores</strong></h1>
    <div class="row">
        <!-- Información simulador 1 -->
        <?php while ($sim = $simuladores->fetch_object()) : ?>
            <div class="col-sm-4">
                <div class="chart-statistic-box">
                        <article class="statistic-box <?php switch ($sim->Status_id) {
                            case 2:
                                echo "yellow";
                                break;
                            case 3:
                                echo "red";
                                break;
                            default:
                                echo "green";
                                break;
                        }?>">
                            <div>
                                <div class="number"><?= $sim->Nombre; ?></div>
                                <div class="caption">
                                    <div><a href="<?= base_url ?>simulador/informacion/<?= $sim->id ?>">+ Info</a></div>
                                </div>
                                <div class="percent">
                                    <div class="arrow up"></div>
                                    <p>15%</p>
                                </div>
                            </div>
                        </article>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <!--.row-->
</div>
<!--.col-->