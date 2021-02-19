<?php $this->view("catalog/header", $data); ?>
  <div style="margin : auto; xam-wid : 600px; width: 100%; padding: 2em;">
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
          <input type="text" name="title"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image title" required>
          <small id="emailHelp" class="form-text text-muted">Add a title to you image.</small>
        </div>
        <div class="form-group">
          <input type="file" name="file" class="btn" id="exampleInputPassword1" placeholder="Password">
        </div>
        <br>
      <button type="submit" class="btn btn-primary">Upload</button>
</form>
  </div>

<?php $this->view("catalog/footer", $data); ?>
