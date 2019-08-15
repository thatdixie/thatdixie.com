<?php
require_once "MusicbrainzDB.php";
require      "Cdtoc.php";

/********************************************************************
 * CdtocModel inherits MusicbrainzDB and provides functions to
 * map Cdtoc class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class CdtocModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Cdtoc by id
     *
     * @return cdtoc
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "discid,".
                      "freedb_id,".
                      "track_count,".
                      "leadout_offset,".
                      "track_offset,".
                      "degraded,".
                      "created ".                      		               
	       "FROM cdtoc ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Cdtoc"));
    }

    /*********************************************************
     * Insert a new Cdtoc into musicbrainz database
     *
     * @param $cdtoc
     * @return n/a
     *********************************************************
     */
    public function insert($cdtoc)
    {
        $query="INSERT INTO cdtoc ( ".
	              "id,".
                      "discid,".
                      "freedb_id,".
                      "track_count,".
                      "leadout_offset,".
                      "track_offset,".
                      "degraded,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($cdtoc->discid)."',".
                      "'".$this->sqlSafe($cdtoc->freedb_id)."',".
                      " ".$cdtoc->track_count." ,".
                      " ".$cdtoc->leadout_offset." ,".
                      "'".$this->sqlSafe($cdtoc->track_offset)."',".
                      "'".$this->sqlSafe($cdtoc->degraded)."',".
                      "'".$this->sqlSafe($cdtoc->created)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Cdtoc into musicbrainz database
     * and return a Cdtoc with new autoincrement
     * primary key
     *
     * @param  $cdtoc
     * @return $cdtoc
     *********************************************************
     */
    public function insert2($cdtoc)
    {
        $query="INSERT INTO cdtoc ( ".
	              "id,".
                      "discid,".
                      "freedb_id,".
                      "track_count,".
                      "leadout_offset,".
                      "track_offset,".
                      "degraded,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($cdtoc->discid)."',".
                      "'".$this->sqlSafe($cdtoc->freedb_id)."',".
                      " ".$cdtoc->track_count." ,".
                      " ".$cdtoc->leadout_offset." ,".
                      "'".$this->sqlSafe($cdtoc->track_offset)."',".
                      "'".$this->sqlSafe($cdtoc->degraded)."',".
                      "'".$this->sqlSafe($cdtoc->created)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $cdtoc->id = $id;
	    return($cdtoc);	
    }


    /*********************************************************
     * Update a Cdtoc in musicbrainz database
     *
     * @param $cdtoc
     * @return n/a
     *********************************************************
     */
    public function update($cdtoc)
    {
        $query="UPDATE  cdtoc ".
	          "SET ".
                      "id= ".$cdtoc->id." ,".
                      "discid='".$this->sqlSafe($cdtoc->discid)."',".
                      "freedb_id='".$this->sqlSafe($cdtoc->freedb_id)."',".
                      "track_count= ".$cdtoc->track_count." ,".
                      "leadout_offset= ".$cdtoc->leadout_offset." ,".
                      "track_offset='".$this->sqlSafe($cdtoc->track_offset)."',".
                      "degraded='".$this->sqlSafe($cdtoc->degraded)."',".
                      "created='".$this->sqlSafe($cdtoc->created)."' ".                      
	          "WHERE id=".$cdtoc->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Cdtoc by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM cdtoc WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>