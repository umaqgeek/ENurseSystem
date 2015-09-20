
<?php //print_r($patient); ?>

<?php
function getField($prop, $val) {
    echo '<tr><td align="right">'.$prop.' :</td>';
    echo '<td>'.$val.'</td></tr>';
}
?>

<table class="table table-bordered center">
<?php if (isset($patient) && !empty($patient)) { ?>

<?=getField('PMI No.', $patient[0]->np_pmi_id); ?>
<?=getField('Full Name', $patient[0]->np_fullname); ?>
<?=getField('IC No.', $patient[0]->np_ic); ?>
<?=getField('Passport No.', $patient[0]->np_passport); ?>
<?=getField('Gender', $patient[0]->npg_desc); ?>
<?=getField('Ward', $patient[0]->nw_name); ?>
<?=getField('Bed No.', $patient[0]->nb_bed_no); ?>

<?php } else { ?>

    <tr><td><h4><em>.. No Patient with that Search ..</em></h4></td></tr>

<?php } ?>
</table>
