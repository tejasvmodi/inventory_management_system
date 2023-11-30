<?php
if(isset($_SESSION['message'])) :
?>


<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?= $_SESSION['message']?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php
unset($_SESSION['message']);
  
  endif;

?>
<script>Animation
window.setTimeout(function() {
    $(".alert").fadeTo(4000, 0).slideUp(200, function(){
        $(this).remove(); 
    });
}, 2000);
</script>