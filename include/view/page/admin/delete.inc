<?php

/*********************************
 * delete.inc
 * @author megan
 * @param  class $contact
 *********************************
*/
function viewDeleteContact($contact)
{
?>
  <section id="admin-home">
    <div class="container">
      <br><br><br>
      <div class="col-md-6 col-md-offset-1">
        <h2>DELETE this Contact? <?php echo "<a href=\"/admin/managecontacts.php?func=delete&id=".$contact->contactId."&confirm=yes\">YES</a>&nbsp;or&nbsp;<a href=\"/admin/managecontacts.php\">NO</a>";
        ?>
        </h2>
      </div>
      <div class="col-md-6 col-md-offset-1">
        <h3><?php echo $contact->contactSubject; ?></h3>
        <b> <?php echo $contact->contactName." ".
    "<a target=\"mail\" href=mailto:".$contact->contactEmail.">".$contact->contactEmail."</a>"; ?></b>
      </div>
      <div class="col-md-5 text-right">
      <?php echo toHumanDate($contact->contactCreated); ?>
      </div>
      <div class="col-md-5 text-right">
      <?php
        if($contact->contactStatus == "UNREAD")
            echo "<a href=\"/admin/managecontacts.php?func=mark_read&id=".$contact->contactId."\">MARK-READ</a>";
        else
            echo "<a href=\"/admin/managecontacts.php?func=mark_unread&id=".$contact->contactId."\">MARK-UNREAD</a>";
        echo "&nbsp;&nbsp;&nbsp; <a href=\"/admin/managecontacts.php?func=delete&id=".$contact->contactId."\">DELETE</a>";
      ?>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="col-md-6 col-md-offset-1">
<pre>
<?php echo "\n".$contact->contactMessage; ?>
</pre>
      </div>
    </div>
  </section>
<?php
      
}
?>