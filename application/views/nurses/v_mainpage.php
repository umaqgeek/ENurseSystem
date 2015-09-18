
<form method="post" action="<?=site_url('nurses/checkPatient'); ?>">
<div class="row">
    <div class="col-md-2">
        Search Patient : 
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" name="search" />
    </div>
    <br /><br />
    <div class="col-md-10 col-md-offset-2">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</div>
</form>