<?php

include "db.php";
include "header.php";


$result=$conn->query("SELECT * FROM countries");
$row=$result->fetch_assoc();


$abc= $conn->query("SELECT * FROM blog_categories");
$cat=$abc->fetch_assoc();

$blauthor = $conn->query("SELECT * FROM blog_authors");
$bl = $blauthor->fetch_assoc();

$bltag = $conn->query("SELECT * FROM blog_tags");
$tg = $bltag->fetch_assoc();

$states = $conn->query("SELECT * FROM state");
$st = $states->fetch_assoc();


$cities = $conn->query("SELECT * FROM city");
$cs = $cities->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4 py-4">
  <form method="POST">
    <div class="row mb-3">
      <div class="col-md-3">
        <label class="form-label">Date </label>
        <input type="date" class="form-control" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Category </label>
        <select class="form-select" required>
          <option selected >Select Category</option>
          <?php foreach ($abc as $category): ?>
                                <option value="<?php echo $category['id']; ?>">
                                    <?php echo ($category['name']); ?>
                                </option>
                            <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Authors </label>
        <select class="form-select" required>
          <option selected >Select Author</option>
             <?php foreach ($blauthor as $author): ?>
                                <option value="<?php echo $author['id']; ?>">
                                    <?php echo ($author['name']); ?>
                                </option>
                                <?php endforeach;?>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Blog Tags</label>
        <select class="form-select">
          <option selected >Select Tags</option>
          <?php foreach ($bltag as $tags): ?>
                                <option value="<?php echo $tags['id']; ?>">
                                    <?php echo ($tags['name']); ?>
                                </option>
                            <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-3">
        <label class="form-label">Status </label>
        <select class="form-select" required>
          <option selected >Select Status</option>
        <option value="1" > Active</option>
        <option value= "2"> Inactive</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Country </label>
        <select class="form-select" required>
          <option selected >Select Country</option>
          <?php foreach ($result as $country): ?>
                                <option value="<?php echo $country['id']; ?>">
                                    <?php echo ($country['name']); ?>
                                </option>
                            <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">State</label>
        <select class="form-select">
          <option selected >Select State</option>
          <?php foreach ($states as $state): ?>
                                <option value="<?php echo $state['id']; ?>">
                                    <?php echo ($state['name']); ?>
                                </option>
                            <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">City</label>
        <select class="form-select">
          <option selected >Select City</option>
           <?php foreach ($cities as $city): ?>
                                <option value="<?php echo $city['id']; ?>">
                                    <?php echo ($city['name']); ?>
                                </option>
                            <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Title </label>
        <input type="text" class="form-control" placeholder="Title" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Page Title </label>
        <input type="text" class="form-control" placeholder="Page Title" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Page Slug</label>
        <input type="text" class="form-control" placeholder="Page Slug">
      </div>
      <div class="col-md-6">
        <label class="form-label">Page URL</label>
        <input type="text" class="form-control" placeholder="Page URL">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Notes</label>
      <textarea class="form-control" rows="3"></textarea>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Meta Description</label>
        <textarea class="form-control" rows="3" placeholder="Meta Description"></textarea>
      </div>
      <div class="col-md-6">
        <label class="form-label">Meta Keyword</label>
        <textarea class="form-control" rows="3" placeholder="Meta Keyword"></textarea>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
  </form>
  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
