<?php
/*
 ***********************************************
 * @author Megan
 ***********************************************
 */

function viewThatDixie()
{
    head();
    navThatDixie();            
?>
  <section id="about">
    <p><br><br><br><br></p>
    <div class="container">
      <div class="center">
        <div class="col-md-6 col-md-offset-3">
          <h2>What's in ThatDixie.com ?</h2>
          <hr>
            The following technologies and design patterns are used on this website:
             <ul>
               <li><a target="capstone" href="https://en.wikipedia.org/wiki/LAMP_(software_bundle)">Linux, Apache, MySQL, PHP</a> (LAMP)</li>
               <li><a target="capstone" href="https://getbootstrap.com/">Bootstrap</a> component library</li>
               <li><a target="capstone" href="https://jquery.com/">jQuery</a> JavaScript library</li>
               <li><a target="capstone" href="http://entityobjects.com">EntityObjects.com</a> Object Relational Mapping Tool (ORM</li>
               <li><a target="capstone" href="https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller">Model View Controller</a> (MVC Design Pattern)</li>
               <li><a target="capstone" href="https://github.com/thatdixie/thatdixieCGI/blob/master/admin/cms.cpp">A Simple Content Management System (CMS)</a> using</li>
               <li><a target="capstone" href="https://github.com/thatdixie/libdixie">My C++ Library</a> and CGI's using</li>
               <li><a target="capstone" href="https://github.com/thatdixie/libdixie/tree/master/cgidiaper">CGIDiaper</a></li>
             </ul>
        </div>
      </div>
    </div>
  </section>
<?php

    foot();
}

?>
