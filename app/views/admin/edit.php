<div class="container">
  <div class="row mt-3">
    <div class="d-flex align-items-end flex-column text-primary">
      <div class="mt-3">
        <a href="/" class="btn btn-primary">Back to tasklist</a>
      </div>
    </div>
  </div>
  <div class="row mt-2 text-white">
    <h2><?php echo $title?></h2>
  </div>
  <form class="" action="/admin/edit/<?php echo $data['id'];?>" method="post">
  <div class="row mt-4">
    <div class="col-sm-5 bg-primary border border-primary rounded p-3">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Name</span>
          </div>
          <input type="text" class="form-control" name="name" placeholder="Username" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES);?>" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon2">Email</span>
          </div>
          <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" value="<?php echo htmlspecialchars($data['email'], ENT_QUOTES);?>" aria-describedby="basic-addon2">
        </div>
    </div>
    <div class="col-sm-2 text-primary mx-4">
      <h4>Status</h4>
      <div class="form-check form-switch">
        <input class="form-check-input" name="status" <?php echo ($data['status'] == '1') ? "value='1'" : "value='0'" ?> type="checkbox" id="flexSwitchCheckChecked" <?php echo ($data['status'] == '1') ? "checked" : ""?> >
        <label class="form-check-label" for="flexSwitchCheckChecked"><?php echo ($data['status'] == '1')? "Done" : "Not done" ?></label>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-sm-8 bg-primary border border-primary rounded p-3">
        <h4 class="text-white">Task</h4>
        <textarea class="form-control" name="task" style="height: 200px" aria-label="With textarea"><?php echo htmlspecialchars($data['task'], ENT_QUOTES);?></textarea>
    </div>
  </div>
  <div class="row mt-4">
    <button type="submit" name="submit" class="btn btn-success col-sm-8">
      Save
    </button>
  </div>
</form>
</div>
