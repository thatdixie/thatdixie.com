<?php
require_once "MusicbrainzDB.php";
require      "Deleted_entity.php";

/********************************************************************
 * Deleted_entityModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Deleted_entity class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Deleted_entityModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Deleted_entity VIEW
     *
     * @return deleted_entity
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "data,".
                      "deleted_at ".                      		               
	       "FROM deleted_entity ";
        return($this->selectDB($query, "Deleted_entity"));
    }
}

?>