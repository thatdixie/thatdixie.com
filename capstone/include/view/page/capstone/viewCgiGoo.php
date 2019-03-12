<?php
/*
 ***********************************************
 * @author Megan
 ***********************************************
 */

function viewCgiGoo()
{
    head();
    navCgiGoo();            
?>
  <section id="about">
    <p><br><br><br><br></p>
    <div class="container">
      <div class="center">
        <div class="col-md-6 col-md-offset-3">
          <h2>CGI Goo Demo</h2>
          <hr>
          <p>
            This is one of the first CGI's I've written
            -- it prints out all the apache environment variables.
          </p>
          <p>
            Written in C++, using the
            <a target="capstone" href="https://github.com/thatdixie/libdixie/tree/master/cgidiaper"> CGIDiaper</a> and
            <a target="capstone" href="https://github.com/thatdixie/libdixie/">libdixie</a>.
          </p>
          <p>
            <h2>
            <a target="capstone" href="/admin/cgigoo.cgi?foo=I_just_put_this_in_query_string_for_fun">
              Run cgigoo.cgi
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
