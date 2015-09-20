
<form method="post" action="#!">
    <div class="col-md-3 col-md-offset-1">
        Search by IC No. or Passport No. :
    </div>
    <div class="col-md-6">
        <input type="text" name="carian" id="carian" class="form-control" placeholder="Please enter IC No. or Passport No. to search." />
    </div>
    <div class="col-md2">
        <button class="btn btn-primary" type="button" id="search1">Search</button>
        <button class="btn btn-info" type="button" id="clear">Clear</button>
    </div>
</form>

<div id="paparDetail" class="row center">
    
</div>

<script>
$(document).ready(function() {
    $("#search1").click(function() {
        var search = $("#carian").val();
        $.post("<?=site_url('login/searchPatient/1'); ?>", { ser: search}).done(
                function(data) {
                    $("#paparDetail").html( data );
                });
    });
    $("#clear").click(function() {
        $("#carian").val("");
        $("#paparDetail").html("");
    });
});
</script>