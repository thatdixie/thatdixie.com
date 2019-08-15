<?php
require_once "MusicbrainzDB.php";
require      "Tag_relation.php";

/********************************************************************
 * Tag_relationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Tag_relation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Tag_relationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Tag_relation VIEW
     *
     * @return tag_relation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "tag1,".
                      "tag2,".
                      "weight,".
                      "last_updated ".                      		               
	       "FROM tag_relation ";
        return($this->selectDB($query, "Tag_relation"));
    }
}

?>