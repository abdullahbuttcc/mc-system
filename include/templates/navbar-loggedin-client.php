 <!-- NAVBAR -->
<!--  <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
         <a class="navbar-brand" href="#"><?php echo $_SESSION['username'] ?></a>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>accountdetails.php">Account Details</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url() ?>currentplan.php">Current Plan</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url() ?>status.php">Status</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url() ?>search.php">Search & Book</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url() ?>discussion.php">Discussion</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url() ?>currentbookings.php">List of Current Bookings</a>
                 </li>
                 
             </ul>
         </div>
         <form class="form-inline my-2 my-lg-0" action="<?php echo base_url() . "logout.php" ?>">
             <input type="hidden" value="1" name='logout'>
             <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" class="btn btn-link btn-logout">Logout</button>
         </form>

     </div>
 </nav> -->
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
<style>
.vertical-menu {
  width: 200px;
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
  background-color: #04AA6D;
  color: white;
}
</style>
<div class="col-2 bg-light">
    <!-- <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active text-left" id="v-pills-home-tab" data-toggle="pill" href="#<?php echo base_url() ?>accountdetails.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Account Details</a>
        <a class="nav-link text-left" id="v-pills-profile-tab" data-toggle="pill" href="#<?php echo base_url() ?>currentplan.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">Current Plan</a>
        <a class="nav-link text-left" id="v-pills-messages-tab" data-toggle="pill" href="#<?php echo base_url() ?>status.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Status</a>
        <a class="nav-link text-left" id="v-pills-settings-tab" data-toggle="pill" href="#<?php echo base_url() ?>search.php" role="tab" aria-controls="v-pills-settings" aria-selected="false">Search & Book</a>
        <a class="nav-link text-left" id="v-pills-settings-tab" data-toggle="pill" href="#<?php echo base_url() ?>discussion.php" role="tab" aria-controls="v-pills-settings" aria-selected="false">Discussion</a>
        <a class="nav-link text-left" id="v-pills-settings-tab" data-toggle="pill" href="#<?php echo base_url() ?>currentbookings.php" role="tab" aria-controls="v-pills-settings" aria-selected="false">List of Current Bookings</a>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="<?php echo base_url() ?>accountdetails.php" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
        <div class="tab-pane fade" id="<?php echo base_url() ?>accountdetails.php" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
        <div class="tab-pane fade" id="<?php echo base_url() ?>currentplan.php" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
    </div>-->
<div class="vertical-menu">
  <a href="./accountdetails.php" >Account Details</a>
  <a href="./currentplan.php" >Current Plan</a>
  <a href="./status.php">Status</a>
  <a href="./search.php">Search & Book</a>
  <a href="./discussion.php">Discussion</a>
  <a href="./currentbookings.php">List of Current Bookings</a>
</div>












</div>