<?php

/*********************************
 * foot.inc
 * @author megan
 *********************************
*/
function foot()
{
?>
    <footer id="footer" class="midnight-blue">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
              <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
            </div>
	    <!-- <div id="copyrightyear"></div> -->
	    &copy
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script>
	    Megan Williams
          </div>
          <div class="top-bar"> 
            <div class="col-lg-12">
              <div class="social">
                <ul class="social-share">
                  <li><a href="https://www.facebook.com/profile.php?id=100005161504879"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="https://instagram.com/cyrusface"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="https://www.linkedin.com/in/megan-williams-58755935"><i class="fa fa-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer><!--/#footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- load CGIDiaper content managed html here -->
    <script src="js/dixie.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php
}
?>