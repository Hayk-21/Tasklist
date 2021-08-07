<div class="container">
    <div class="row mt-3">
      <div class="d-flex align-items-end flex-column text-primary">
        <div class="mt-3">
          <a href="/" class="btn btn-primary">Back to tasklist</a>
        </div>
      </div>
    </div>
    <div class="row mt-1 d-flex justify-content-center mt-5">
      <div class="col-sm-5 bg-dark text-primary p-5 rounded border border-primary">
        <form action="/admin/login" method="post">
          <div class="form-group p-2">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" name="login" class="form-control mt-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group p-2">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control mt-1" id="exampleInputPassword1" placeholder="Password">
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary m-2">Submit</button>
        </form>
      </div>
    </div>
</div>
