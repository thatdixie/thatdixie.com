<?php
require_once "MusicbrainzDB.php";
require      "Event_annotation.php";

/********************************************************************
 * Event_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Event_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Event_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Event_annotation VIEW
     *
     * @return event_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "event,".
                      "annotation ".                      		               
	       "FROM event_annotation ";
        return($this->selectDB($query, "Event_annotation"));
    }
}

?>