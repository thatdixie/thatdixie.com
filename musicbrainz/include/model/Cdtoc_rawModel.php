<?php
require_once "MusicbrainzDB.php";
require      "Cdtoc_raw.php";

/********************************************************************
 * Cdtoc_rawModel inherits MusicbrainzDB and provides functions to
 * map Cdtoc_raw class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Cdtoc_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Cdtoc_raw by id
     *
     * @return cdtoc_raw
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "release,".
                      "discid,".
                      "track_count,".
                      "leadout_offset,".
                      "track_offset ".                      		               
	       "FROM cdtoc_raw ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Cdtoc_raw"));
    }

    /*********************************************************
     * Insert a new Cdtoc_raw into musicbrainz database
     *
     * @param $cdtoc_raw
     * @return n/a
     *********************************************************
     */
    public function insert($cdtoc_raw)
    {
        $query="INSERT INTO cdtoc_raw ( ".
	              "id,".
                      "release,".
                      "discid,".
                      "track_count,".
                      "leadout_offset,".
                      "track_offset ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$cdtoc_raw->release." ,".
                      "'".$this->sqlSafe($cdtoc_raw->discid)."',".
                      " ".$cdtoc_raw->track_count." ,".
                      " ".$cdtoc_raw->leadout_offset." ,".
                      "'".$this->sqlSafe($cdtoc_raw->track_offset)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Cdtoc_raw into musicbrainz database
     * and return a Cdtoc_raw with new autoincrement
     * primary key
     *
     * @param  $cdtoc_raw
     * @return $cdtoc_raw
     *********************************************************
     */
    public function insert2($cdtoc_raw)
    {
        $query="INSERT INTO cdtoc_raw ( ".
	              "id,".
                      "release,".
                      "discid,".
                      "track_count,".
                      "leadout_offset,".
                      "track_offset ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$cdtoc_raw->release." ,".
                      "'".$this->sqlSafe($cdtoc_raw->discid)."',".
                      " ".$cdtoc_raw->track_count." ,".
                      " ".$cdtoc_raw->leadout_offset." ,".
                      "'".$this->sqlSafe($cdtoc_raw->track_offset)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $cdtoc_raw->id = $id;
	    return($cdtoc_raw);	
    }


    /*********************************************************
     * Update a Cdtoc_raw in musicbrainz database
     *
     * @param $cdtoc_raw
     * @return n/a
     *********************************************************
     */
    public function update($cdtoc_raw)
    {
        $query="UPDATE  cdtoc_raw ".
	          "SET ".
                      "id= ".$cdtoc_raw->id." ,".
                      "release= ".$cdtoc_raw->release." ,".
                      "discid='".$this->sqlSafe($cdtoc_raw->discid)."',".
                      "track_count= ".$cdtoc_raw->track_count." ,".
                      "leadout_offset= ".$cdtoc_raw->leadout_offset." ,".
                      "track_offset='".$this->sqlSafe($cdtoc_raw->track_offset)."' ".                      
	          "WHERE id=".$cdtoc_raw->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Cdtoc_raw by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM cdtoc_raw WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>