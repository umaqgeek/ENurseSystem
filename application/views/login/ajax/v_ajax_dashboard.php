<?php 
if (isset($wards) && !empty($wards)) { 
    foreach ($wards as $wa) { 
        $nw_id = $wa->nw_id;
        $beds = $this->m_nus_bed->getAll_byParent($nw_id);
?>
<div class="col-md-2">
<table class="table table-bordered">
    <tr>
        <td align="left" valign="top"><strong><?=$wa->nw_name; ?></strong></td>
    </tr>
    <tr>
        <td align="left" valign="top">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Bed No.</th>
                    <th>Gender</th>
                    <th>Remarks</th>
                </tr>
                <?php 
                $i=0;
                if (isset($beds) && !empty($beds)) { 
                    foreach ($beds as $be) {                        
                        $color1 = ($be->color1 != null) ? ($be->color1) : ("#fff");
                        $color2 = ($be->color2 != null) ? ($be->color2) : ("#fff");
                ?>
                <tr>
                    <td><?=$be->nb_bed_no; ?></td>
                    <td style="background-color: <?=$color1; ?>;"><?=$be->npg_code; ?></td>
                    <td style="background-color: <?=$color2; ?>;"><?=$be->nbs_code; ?></td>
                </tr>
                <?php $i++; } } ?>
                <tr>
                    <th>Total</th>
                    <th>:</th>
                    <th><?=$i; ?> bed<?=($i>1)?("s"):(""); ?></th>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<?php } } ?>

<div class="col-md-12"><hr /></div>

<?php 
if (isset($wards2) && !empty($wards2)) { 
    foreach ($wards2 as $wa) { 
        $nw_id = $wa->nw_id;
?>
<div class="col-md-2">
<table class="table table-bordered">
    <tr>
        <td align="left" valign="top"><strong><?=$wa->nw_name; ?></strong></td>
    </tr>
    <tr>
        <td align="left" valign="top">
            <table class="table table-hover table-bordered">
                <?php
                $total = 0;
                if (isset($status) && !empty($status)) { 
                    foreach ($status as $st) {                        
                        $color1 = ($st->nc_color != null) ? ($st->nc_color) : ("#fff");
                ?>
                <tr>
                    <td style="background-color: <?=$color1; ?>;"><?=$st->nbs_code; ?></td>
                    <td><?php
                    $nbs_id = $st->nbs_id;
                    $count1 = $this->m_nus_bed->getAll_byParent($nw_id, $nbs_id);
                    echo $c1 = sizeof($count1);
                    $total += $c1;
                    ?></td>
                </tr>
                <?php } } ?>
                <?php
                if (isset($gender) && !empty($gender)) { 
                    foreach ($gender as $ge) {                        
                        $color2 = ($ge->nc_color != null) ? ($ge->nc_color) : ("#fff");
                ?>
                <tr>
                    <td style="background-color: <?=$color2; ?>;"><?=$ge->npg_code; ?></td>
                    <td><?php
                    $npg_id = $ge->npg_id;
                    $count2 = $this->m_nus_bed->getAll_byParent($nw_id, -1, $npg_id);
                    echo $c2 = sizeof($count2);
                    $total += $c2;
                    ?></td>
                </tr>
                <?php } } ?>
                <tr>
                    <th>Total</th>
                    <th><?=$total; ?></th>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<?php } } ?>