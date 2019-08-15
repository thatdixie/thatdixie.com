<?php
require_once "MusicbrainzDB.php";
require      "Isrc.php";

/********************************************************************
 * IsrcModel inherits MusicbrainzDB and provides functions to
 * map Isrc class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class IsrcModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Isrc by id
     *
     * @return isrc
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "recording,".
                      "isrc,".
                      "source,".
                      "edits_pending,".
                      "created ".                      		               
	       "FROM isrc ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Isrc"));
    }

    /*********************************************************
     * Insert a new Isrc into musicbrainz database
     *
     * @param $isrc
     * @return n/a
     *********************************************************
     */
    public function insert($isrc)
    {
        $query="INSERT INTO isrc ( ".
	              "id,".
                      "recording,".
                      "isrc,".
                      "source,".
                      "edits_pending,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$isrc->recording." ,".
                      "'".$this->sqlSafe($isrc->isrc)."',".
                      " ".$isrc->source." ,".
                      " ".$isrc->edits_pending." ,".
                      "'".$this->sqlSafe($isrc->created)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Isrc into musicbrainz database
     * and return a Isrc with new autoincrement
     * primary key
     *
     * @param  $isrc
     * @return $isrc
     *********************************************************
     */
    public function insert2($isrc)
    {
        $query="INSERT INTO isrc ( ".
	              "id,".
                      "recording,".
                      "isrc,".
                      "source,".
                      "edits_pending,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$isrc->recording." ,".
                      "'".$this->sqlSafe($isrc->isrc)."',".
                      " ".$isrc->source." ,".
                      " ".$isrc->edits_pending." ,".
                      "'".$this->sqlSafe($isrc->created)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $isrc->id = $id;
	    return($isrc);	
    }


    /*********************************************************
     * Update a Isrc in musicbrainz database
     *
     * @param $isrc
     * @return n/a
     *********************************************************
     */
    public function update($isrc)
    {
        $query="UPDATE  isrc ".
	          "SET ".
                      "id= ".$isrc->id." ,".
                      "recording= ".$isrc->recording." ,".
                      "isrc='".$this->sqlSafe($isrc->isrc)."',".
                      "source= ".$isrc->source." ,".
                      "edits_pending= ".$isrc->edits_pending." ,".
                      "created='".$this->sqlSafe($isrc->created)."' ".                      
	          "WHERE id=".$isrc->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Isrc by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM isrc WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>