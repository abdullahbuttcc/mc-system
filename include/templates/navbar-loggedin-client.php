<?php 
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[2];
?>
<div class="row">
    <div class="row navbar navbar-expand-lg navbar-light bg-light" style="padding-top: 0.5rem;padding-bottom: 0.5rem;">
        <div class="col-2 text-center">
            Logo
        </div>
        <div class="col-8 text-center">
            ManageCare
        </div>
        <div class="col-2 text-center">
            <span style="margin-left: 130px;"><?php echo $_SESSION['name']; ?></span>
            <form class="form-inline my-2 my-lg-0" action="<?php echo base_url() . 'logout.php' ?>">
                <input type="hidden" value="1" name='logout'>
                <button class="btn btn-outline-danger my-2 my-sm-0 ml-auto" type="submit" class="btn btn-link btn-logout">Logout</button>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
    <div class="row">
        <style>
            .vertical-menu {
              width: 100%;
            }

            .vertical-menu a {
              background-color: #F8F9FA;
              color: black;
              display: block;
              padding: 12px;
              text-decoration: none;
              text-align: left;
            }

            .vertical-menu a:hover {
              background-color: #ccc;
            }

            .vertical-menu a.active {
              background-color: #007BFF;
              color: white;
            }
        </style>
        <div class="col-2 bg-light" style="padding-bottom: 100%;padding-right: 0%;">
            <div class="vertical-menu">
              <a href="./accountdetails.php" class="<?php if ($first_part=="accountdetails.php") {echo "active"; } else  {echo "noactive";}?>">Account Details</a>
              <a href="./currentplan.php" class="<?php if ($first_part=="currentplan.php") {echo "active"; } else  {echo "noactive";}?>">Current Plan</a>
              <a href="./currentbookings.php" class="<?php if ($first_part=="currentbookings.php") {echo "active"; } else  {echo "noactive";}?>">List of Current Bookings</a>
              <a href="./search.php" class="<?php if ($first_part=="search.php") {echo "active"; } else  {echo "noactive";}?>">Search & Book</a>
              <a href="./discussion.php" class="<?php if ($first_part=="discussion.php") {echo "active"; } else  {echo "noactive";}?>">Discussion</a>
            </div>
        </div>