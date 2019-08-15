<?php
require_once "MusicbrainzDB.php";
require      "Iswc.php";

/********************************************************************
 * IswcModel inherits MusicbrainzDB and provides functions to
 * map Iswc class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class IswcModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Iswc by id
     *
     * @return iswc
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "work,".
                      "iswc,".
                      "source,".
                      "edits_pending,".
                      "created ".                      		               
	       "FROM iswc ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Iswc"));
    }

    /*********************************************************
     * Insert a new Iswc into musicbrainz database
     *
     * @param $iswc
     * @return n/a
     *********************************************************
     */
    public function insert($iswc)
    {
        $query="INSERT INTO iswc ( ".
	              "id,".
                      "work,".
                      "iswc,".
                      "source,".
                      "edits_pending,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$iswc->work." ,".
                      "'".$this->sqlSafe($iswc->iswc)."',".
                      " ".$iswc->source." ,".
                      " ".$iswc->edits_pending." ,".
                      "'".$this->sqlSafe($iswc->created)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Iswc into musicbrainz database
     * and return a Iswc with new autoincrement
     * primary key
     *
     * @param  $iswc
     * @return $iswc
     *********************************************************
     */
    public function insert2($iswc)
    {
        $query="INSERT INTO iswc ( ".
	              "id,".
                      "work,".
                      "iswc,".
                      "source,".
                      "edits_pending,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$iswc->work." ,".
                      "'".$this->sqlSafe($iswc->iswc)."',".
                      " ".$iswc->source." ,".
                      " ".$iswc->edits_pending." ,".
                      "'".$this->sqlSafe($iswc->created)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $iswc->id = $id;
	    return($iswc);	
    }


    /*********************************************************
     * Update a Iswc in musicbrainz database
     *
     * @param $iswc
     * @return n/a
     *********************************************************
     */
    public function update($iswc)
    {
        $query="UPDATE  iswc ".
	          "SET ".
                      "id= ".$iswc->id." ,".
                      "work= ".$iswc->work." ,".
                      "iswc='".$this->sqlSafe($iswc->iswc)."',".
                      "source= ".$iswc->source." ,".
                      "edits_pending= ".$iswc->edits_pending." ,".
                      "created='".$this->sqlSafe($iswc->created)."' ".                      
	          "WHERE id=".$iswc->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Iswc by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM iswc WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>