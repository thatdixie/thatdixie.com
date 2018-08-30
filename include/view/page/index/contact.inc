<?php

/*********************************
 * contact.inc
 * @author megan
 *********************************
*/
function contact()
{
?>
    <section id="contact">
      <div class="contact-page">
        <div class="container">
          <div class="center">
            <h2><div id="contacthead"></div></h2>
          </div>
          <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>
            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="/contacts/contact.php">
              <div class="wow fadeInDown">
                <div class="col-sm-5 col-sm-offset-1">
                  <div class="form-group">
                    <label>Name *</label>
                    <input type="text" name="name" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                  </div>
                  <!--<div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control">
                      </div> -->
                </div>
              </div>
              <div class="wow fadeInRight">
                <div class="col-sm-5">
                  <div class="form-group">
                    <label>Subject *</label>
                    <input type="text" name="subject" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label>Message *</label>
                    <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Post Up!</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?php
}
?>