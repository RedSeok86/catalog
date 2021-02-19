<?php $this->view("catalog/header", $data); ?>
  <div style="margin : auto; xam-wid : 600px; width: 100%; padding: 2em;">
    <h2 class="col-6 tm-text-primary">
        SignUp
    </h2>
    <form method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Email을 입력해주세요.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
<?php $this->view("catalog/footer", $data); ?>
