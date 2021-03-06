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
          <div class="col-md-1">
            <div class="site-logo">
              <a href="/" class="brand"><img src="/images/kiss.jpg" height="50" width="50"></a>
            </div>
          </div>
          <div class="col-md-11">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav navbar-left">
                <li>
                  <a href="#home" data-toggle="collapse" data-target=".navbar-collapse.in"></a>
                </li>
                <li>
                  <a href="#about" data-toggle="collapse" data-target=".navbar-collapse.in">Megan Williams</a>
                </li>
                <li>
                  <a href="/capstone/DixieResume.pdf" data-toggle="collapse" data-target=".navbar-collapse.in">Resume</a>
                </li>
                <li>
                  <a href="#projectshit" data-toggle="collapse" data-target=".navbar-collapse.in">Programing Projects</a>
                </li>
                <li>
                  <a href="#funshit" data-toggle="collapse" data-target=".navbar-collapse.in">Fun</a>
                </li>
                <li>
                  <a href="#contact" data-toggle="collapse" data-target=".navbar-collapse.in">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
<?php
}
?>