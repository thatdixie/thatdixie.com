<?php

/*********************************
 * nav.inc
 * @author megan
 *********************************
*/
function navPdfViewer()
{
?>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="site-logo">
              <a href="/" class="brand">ThatDixie.com</a>
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
                <li>
                  <a href="/#projectshit" data-toggle="collapse" data-target=".navbar-collapse.in">Programing Projects</a>
                </li>
                <li>
                  <a target="capstone" href="https://github.com/thatdixie/thatdixieCGI/blob/master/admin/pdfviewer.cpp" data-toggle="collapse" data-target=".navbar-collapse.in">Source Code on Git</a>
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