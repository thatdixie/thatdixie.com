<?php

/*********************************
 * nav.inc
 * @author megan
 *********************************
*/
function nav()
{
?>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="site-logo">
              <a href="/" class="brand">Megan Williams</a>
            </div>
          </div>
          <div class="col-md-10">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <i class="fa fa-bars"></i>
              </button>  
            </div>
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="/admin/">Admin Home</a></li>
                <li><a href="/admin/managecontacts.php">Manage Contacts</a></li>
                <li><a href="/admin/login.cgi?logout=yes">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <p></p>
    <br><br><br><br>
<?php
}
?>