<?php if($success): ?>
<div class="notice" id="generated">Link wygenerowany pomyślnie.</div>
<?php else: ?>
<div class="error" id="generated">Wystąpił problem podczas generowania linku.
  <?php if($error): ?>
    <p id="error"><?php echo $error; ?></p>
  <?php endif; ?>
</div>
<?php endif; ?>