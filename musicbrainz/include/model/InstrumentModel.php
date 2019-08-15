<?php
require_once "MusicbrainzDB.php";
require      "Instrument.php";

/********************************************************************
 * InstrumentModel inherits MusicbrainzDB and provides functions to
 * map Instrument class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class InstrumentModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Instrument by id
     *
     * @return instrument
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "type,".
                      "edits_pending,".
                      "last_updated,".
                      "comment,".
                      "description ".                      		               
	       "FROM instrument ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Instrument"));
    }

    /*********************************************************
     * Insert a new Instrument into musicbrainz database
     *
     * @param $instrument
     * @return n/a
     *********************************************************
     */
    public function insert($instrument)
    {
        $query="INSERT INTO instrument ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "type,".
                      "edits_pending,".
                      "last_updated,".
                      "comment,".
                      "description ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($instrument->gid)."',".
                      "'".$this->sqlSafe($instrument->name)."',".
                      " ".$instrument->type." ,".
                      " ".$instrument->edits_pending." ,".
                      "'".$this->sqlSafe($instrument->last_updated)."',".
                      "'".$this->sqlSafe($instrument->comment)."',".
                      "'".$this->sqlSafe($instrument->description)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Instrument into musicbrainz database
     * and return a Instrument with new autoincrement
     * primary key
     *
     * @param  $instrument
     * @return $instrument
     *********************************************************
     */
    public function insert2($instrument)
    {
        $query="INSERT INTO instrument ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "type,".
                      "edits_pending,".
                      "last_updated,".
                      "comment,".
                      "description ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($instrument->gid)."',".
                      "'".$this->sqlSafe($instrument->name)."',".
                      " ".$instrument->type." ,".
                      " ".$instrument->edits_pending." ,".
                      "'".$this->sqlSafe($instrument->last_updated)."',".
                      "'".$this->sqlSafe($instrument->comment)."',".
                      "'".$this->sqlSafe($instrument->description)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $instrument->id = $id;
	    return($instrument);	
    }


    /*********************************************************
     * Update a Instrument in musicbrainz database
     *
     * @param $instrument
     * @return n/a
     *********************************************************
     */
    public function update($instrument)
    {
        $query="UPDATE  instrument ".
	          "SET ".
                      "id= ".$instrument->id." ,".
                      "gid='".$this->sqlSafe($instrument->gid)."',".
                      "name='".$this->sqlSafe($instrument->name)."',".
                      "type= ".$instrument->type." ,".
                      "edits_pending= ".$instrument->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($instrument->last_updated)."',".
                      "comment='".$this->sqlSafe($instrument->comment)."',".
                      "description='".$this->sqlSafe($instrument->description)."' ".                      
	          "WHERE id=".$instrument->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Instrument by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM instrument WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>