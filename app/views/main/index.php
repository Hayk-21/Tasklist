<div class="container">

  <div class="row mt-3">
    <div class="d-flex align-items-end flex-column text-primary">
      <div class="mt-3 ">
        <?php if (isset($_SESSION['admin'])): ?>
                <a href="/admin/logout" class="btn btn-primary">Logout</a>
        <?php else: ?>
                <a href="/admin/login" class="btn btn-primary">Admin login</a>
        <?php endif ?>
      </div>
    </div>
  </div>

  <div class="row mt-4">

    <div class="col-sm-11 bg-primary border border-primary rounded pb-2">
    <?php if(empty($list)): ?>
        <h3>Tasklist is empty !</h3>
    <?php else: ?>
      <?php foreach ($list as $val): ?>
          <div class="container mt-2 bg-dark border border-primary rounded text-white">
            <div class="row p-2">
              <div class="col-sm-4">
                Name: <b><?php echo htmlspecialchars($val['name'], ENT_QUOTES);?></b>
              </div>
              <div class="col-sm-4">
                Email: <b><?php echo htmlspecialchars($val['email'], ENT_QUOTES);?></b>
              </div>
              <div class="col-sm-2">
                <?php if($val['status']): ?>
                Status: <b class="text-success">Done</b>
              <?php else: ?>
                Status: <b class="text-warning">Not done</b>
              <?php endif ?>
              </div>
              <?php if (isset($_SESSION['admin'])): ?>
              <div class="col-sm-2">
                <small><a href="/admin/edit/<?php echo $val['id'] ?>"  class="btn btn-success">Edit</a></small>
                <small><a href="/admin/delete/<?php echo $val['id'] ?>"  class="btn btn-danger">Delete</a></small>
              </div>
              <?php endif?>
            </div>
            <div class="row p-1">
              <div class="row">
                <div class="col-sm-1 h4"><b>Task</b></div>
                <?php if($val['edited']): ?>
                <div class="col-sm-11 text-danger"><b>Edited by administrator</b></div>
              <?php endif ?>
              </div>
              <div class="overflow-auto" style="height: 80px">
                <div class="force-overflow">
                  <?php echo htmlspecialchars($val['task'], ENT_QUOTES);?>
                </div>
              </div>
            </div>
          </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

      <form action="/" method="post" class="col-sm-1">
        <div class="col-sm-12 mb-2 bg-success btn text-white">
          Sort by
        </div>


        <input type="submit" class="btn-check" name="sort[]" value="name" id="btn-name" autocomplete="off" checked>
        <label class="btn btn-outline-primary col-sm-12 mb-2 text-white" for="btn-name">Name</label>

        <input type="submit" class="btn-check" name="sort[]" value="email" id="btn-email" autocomplete="off">
        <label class="btn btn-outline-primary col-sm-12 mb-2 text-white" for="btn-email">Email</label>

        <input type="submit" class="btn-check" name="sort[]" value="status" id="btn-status" autocomplete="off">
        <label class="btn btn-outline-primary col-sm-12 mb-2 text-white" for="btn-status">Status</label>
      </form>
  </div>

  <div class="row mt-3">
    <div class="col-sm-8">

      <?php echo $pagination; ?>
    </div>
    <div class="d-flex align-items-end flex-column text-primary col-sm-3">
      <div class="">
        <a href="/add" class="btn btn-primary">Add new task</a>
      </div>
    </div>
  </div>
</div>
