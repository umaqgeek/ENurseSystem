
<style>
    table {
        font-size: 10px;
    }
</style>

<div class="row" style="margin-top: -5%;" id="showBoard">

</div>

<script>
function loopShow() {
    $.post("<?=site_url('login/getAjaxDashboard'); ?>", {}).done(
            function(data) {
                $("#showBoard").html( data );
            });
    setTimeout('loopShow()', 500);
}
$(document).ready(function() {
    loopShow();
});
</script>