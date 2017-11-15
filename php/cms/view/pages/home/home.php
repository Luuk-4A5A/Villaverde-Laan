<?php include('view/pages/includes/head.php'); ?>

<textarea>
  <?php
  if(isset($data['filecontent'])) {
    echo $data['fileContent'];
  }

  if(isset($data['result'])) {
    print_r($data['result']);
  }

  ?>
</textarea>

<?php include('view/pages/includes/footer.php'); ?>
