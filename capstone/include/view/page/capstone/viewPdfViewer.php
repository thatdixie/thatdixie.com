<?php
/*
 ***********************************************
 * @author Megan
 ***********************************************
 */

function viewPdfViewer()
{
    head();
    navPdfViewer();
?>
  <section id="about">
    <p><br><br><br><br></p>
    <div class="container">
      <div class="center">
        <div class="col-md-6 col-md-offset-3">
          <h2>PDF Viewer Demo</h2>
          <hr>
          <p>
            So, let's say you want to display a PDF file but require the user to be "logged-in" or registered 
            -- or you just don't want the the PDF file to be directly available.
          </p>
          <p>
            Written in C++, using the
            <a target="capstone" href="https://github.com/thatdixie/libdixie/tree/master/cgidiaper"> CGIDiaper</a> and
            <a target="capstone" href="https://github.com/thatdixie/libdixie/">libdixie</a>.
          </p>
          <p>
            <h2>
            <a target="capstone" href="/admin/pdfviewer.cgi?doc=The_C__Programming_Language__Stroustrup_.pdf">
              The C Programming Language
            </a>
            </h2>
          </p>
        </div>
      </div>
    </div>
  </section>
<?php

    foot();
}

?>
