<?php
require_once "MusicbrainzDB.php";
require      "Event_type.php";

/********************************************************************
 * Event_typeModel inherits MusicbrainzDB and provides functions to
 * map Event_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Event_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Event_type by id
     *
     * @return event_type
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
	       "FROM event_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Event_type"));
    }

    /*********************************************************
     * Insert a new Event_type into musicbrainz database
     *
     * @param $event_type
     * @return n/a
     *********************************************************
     */
    public function insert($event_type)
    {
        $query="INSERT INTO event_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($event_type->name)."',".
                      " ".$event_type->parent." ,".
                      " ".$event_type->child_order." ,".
                      "'".$this->sqlSafe($event_type->description)."',".
                      "'".$this->sqlSafe($event_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Event_type into musicbrainz database
     * and return a Event_type with new autoincrement
     * primary key
     *
     * @param  $event_type
     * @return $event_type
     *********************************************************
     */
    public function insert2($event_type)
    {
        $query="INSERT INTO event_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($event_type->name)."',".
                      " ".$event_type->parent." ,".
                      " ".$event_type->child_order." ,".
                      "'".$this->sqlSafe($event_type->description)."',".
                      "'".$this->sqlSafe($event_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $event_type->id = $id;
	    return($event_type);	
    }


    /*********************************************************
     * Update a Event_type in musicbrainz database
     *
     * @param $event_type
     * @return n/a
     *********************************************************
     */
    public function update($event_type)
    {
        $query="UPDATE  event_type ".
	          "SET ".
                      "id= ".$event_type->id." ,".
                      "name='".$this->sqlSafe($event_type->name)."',".
                      "parent= ".$event_type->parent." ,".
                      "child_order= ".$event_type->child_order." ,".
                      "description='".$this->sqlSafe($event_type->description)."',".
                      "gid='".$this->sqlSafe($event_type->gid)."' ".                      
	          "WHERE id=".$event_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Event_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM event_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>