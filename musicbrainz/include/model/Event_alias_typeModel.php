<?php
require_once "MusicbrainzDB.php";
require      "Event_alias_type.php";

/********************************************************************
 * Event_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Event_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Event_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Event_alias_type by id
     *
     * @return event_alias_type
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      		               
	       "FROM event_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Event_alias_type"));
    }

    /*********************************************************
     * Insert a new Event_alias_type into musicbrainz database
     *
     * @param $event_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($event_alias_type)
    {
        $query="INSERT INTO event_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($event_alias_type->name)."',".
                      " ".$event_alias_type->parent." ,".
                      " ".$event_alias_type->child_order." ,".
                      "'".$this->sqlSafe($event_alias_type->description)."',".
                      "'".$this->sqlSafe($event_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Event_alias_type into musicbrainz database
     * and return a Event_alias_type with new autoincrement
     * primary key
     *
     * @param  $event_alias_type
     * @return $event_alias_type
     *********************************************************
     */
    public function insert2($event_alias_type)
    {
        $query="INSERT INTO event_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($event_alias_type->name)."',".
                      " ".$event_alias_type->parent." ,".
                      " ".$event_alias_type->child_order." ,".
                      "'".$this->sqlSafe($event_alias_type->description)."',".
                      "'".$this->sqlSafe($event_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $event_alias_type->id = $id;
	    return($event_alias_type);	
    }


    /*********************************************************
     * Update a Event_alias_type in musicbrainz database
     *
     * @param $event_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($event_alias_type)
    {
        $query="UPDATE  event_alias_type ".
	          "SET ".
                      "id= ".$event_alias_type->id." ,".
                      "name='".$this->sqlSafe($event_alias_type->name)."',".
                      "parent= ".$event_alias_type->parent." ,".
                      "child_order= ".$event_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($event_alias_type->description)."',".
                      "gid='".$this->sqlSafe($event_alias_type->gid)."' ".                      
	          "WHERE id=".$event_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Event_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM event_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>