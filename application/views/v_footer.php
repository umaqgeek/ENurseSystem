        
    </div>
</div>

<?php if(isset($error)) { ?>
<script>
    alert('<?=$error; ?>');
</script>
<div class="modal fade" id="basicModalError" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            </div>
            <div class="modal-body">
            
            <div class="alert alert-danger fade in" role="alert"><?=$error; ?></div>
            
            </div>
    </div>
  </div>
</div>
<?php } else if(isset($sucess)) { ?>
<script>
    alert('<?=$sucess; ?>');
</script>
<div class="modal fade" id="basicModalError" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            </div>
            <div class="modal-body">
            
            <div class="alert alert-success fade in" role="alert"><?=$sucess; ?></div>
            
            </div>
    </div>
  </div>
</div>
<?php } else if(isset($info)) { ?>
<script>
    alert('<?=$info; ?>');
</script>
<div class="modal fade" id="basicModalError" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            </div>
            <div class="modal-body">
            
            <div class="alert alert-info fade in" role="alert"><?=$info; ?></div>
            
            </div>
    </div>
  </div>
</div>
<?php } ?>

</body>

</html>