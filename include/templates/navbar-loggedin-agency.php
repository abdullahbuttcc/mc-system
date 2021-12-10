 <!-- NAVBAR -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
         <a class="navbar-brand" href="#" ?>"><?php echo $_SESSION['username'] ?></a>
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
                 <li class="nav-item">
                     <a class="nav-link " href="<?php echo base_url() ?>services.php">Services</a>
                 </li>
             </ul>
         </div>
         <form class="form-inline my-2 my-lg-0" action="<?php echo base_url() . "logout.php" ?>">
             <input type="hidden" value="1" name='logout'>
             <a class="btn btn-outline-success my-2 my-sm-0" href="<?php echo base_url() ?>newclient.php">Create New Client</a>
             <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" class="btn btn-link btn-logout">Logout</button>
         </form>

     </div>
 </nav>