<?php
require_once "MusicbrainzDB.php";
require      "Medium_cdtoc.php";

/********************************************************************
 * Medium_cdtocModel inherits MusicbrainzDB and provides functions to
 * map Medium_cdtoc class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Medium_cdtocModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Medium_cdtoc by id
     *
     * @return medium_cdtoc
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "medium,".
                      "cdtoc,".
                      "edits_pending,".
                      "last_updated ".                      		               
	       "FROM medium_cdtoc ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Medium_cdtoc"));
    }

    /*********************************************************
     * Insert a new Medium_cdtoc into musicbrainz database
     *
     * @param $medium_cdtoc
     * @return n/a
     *********************************************************
     */
    public function insert($medium_cdtoc)
    {
        $query="INSERT INTO medium_cdtoc ( ".
	              "id,".
                      "medium,".
                      "cdtoc,".
                      "edits_pending,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$medium_cdtoc->medium." ,".
                      " ".$medium_cdtoc->cdtoc." ,".
                      " ".$medium_cdtoc->edits_pending." ,".
                      "'".$this->sqlSafe($medium_cdtoc->last_updated)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Medium_cdtoc into musicbrainz database
     * and return a Medium_cdtoc with new autoincrement
     * primary key
     *
     * @param  $medium_cdtoc
     * @return $medium_cdtoc
     *********************************************************
     */
    public function insert2($medium_cdtoc)
    {
        $query="INSERT INTO medium_cdtoc ( ".
	              "id,".
                      "medium,".
                      "cdtoc,".
                      "edits_pending,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$medium_cdtoc->medium." ,".
                      " ".$medium_cdtoc->cdtoc." ,".
                      " ".$medium_cdtoc->edits_pending." ,".
                      "'".$this->sqlSafe($medium_cdtoc->last_updated)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $medium_cdtoc->id = $id;
	    return($medium_cdtoc);	
    }


    /*********************************************************
     * Update a Medium_cdtoc in musicbrainz database
     *
     * @param $medium_cdtoc
     * @return n/a
     *********************************************************
     */
    public function update($medium_cdtoc)
    {
        $query="UPDATE  medium_cdtoc ".
	          "SET ".
                      "id= ".$medium_cdtoc->id." ,".
                      "medium= ".$medium_cdtoc->medium." ,".
                      "cdtoc= ".$medium_cdtoc->cdtoc." ,".
                      "edits_pending= ".$medium_cdtoc->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($medium_cdtoc->last_updated)."' ".                      
	          "WHERE id=".$medium_cdtoc->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Medium_cdtoc by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM medium_cdtoc WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>