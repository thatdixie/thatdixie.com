<?php
require_once "MusicbrainzDB.php";
require      "Replication_control.php";

/********************************************************************
 * Replication_controlModel inherits MusicbrainzDB and provides functions to
 * map Replication_control class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Replication_controlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Replication_control by id
     *
     * @return replication_control
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "current_schema_sequence,".
                      "current_replication_sequence,".
                      "last_replication_date ".                      		               
	       "FROM replication_control ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Replication_control"));
    }

    /*********************************************************
     * Insert a new Replication_control into musicbrainz database
     *
     * @param $replication_control
     * @return n/a
     *********************************************************
     */
    public function insert($replication_control)
    {
        $query="INSERT INTO replication_control ( ".
	              "id,".
                      "current_schema_sequence,".
                      "current_replication_sequence,".
                      "last_replication_date ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$replication_control->current_schema_sequence." ,".
                      " ".$replication_control->current_replication_sequence." ,".
                      "'".$this->sqlSafe($replication_control->last_replication_date)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Replication_control into musicbrainz database
     * and return a Replication_control with new autoincrement
     * primary key
     *
     * @param  $replication_control
     * @return $replication_control
     *********************************************************
     */
    public function insert2($replication_control)
    {
        $query="INSERT INTO replication_control ( ".
	              "id,".
                      "current_schema_sequence,".
                      "current_replication_sequence,".
                      "last_replication_date ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$replication_control->current_schema_sequence." ,".
                      " ".$replication_control->current_replication_sequence." ,".
                      "'".$this->sqlSafe($replication_control->last_replication_date)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $replication_control->id = $id;
	    return($replication_control);	
    }


    /*********************************************************
     * Update a Replication_control in musicbrainz database
     *
     * @param $replication_control
     * @return n/a
     *********************************************************
     */
    public function update($replication_control)
    {
        $query="UPDATE  replication_control ".
	          "SET ".
                      "id= ".$replication_control->id." ,".
                      "current_schema_sequence= ".$replication_control->current_schema_sequence." ,".
                      "current_replication_sequence= ".$replication_control->current_replication_sequence." ,".
                      "last_replication_date='".$this->sqlSafe($replication_control->last_replication_date)."' ".                      
	          "WHERE id=".$replication_control->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Replication_control by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM replication_control WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>