<?php
require_once "MusicbrainzDB.php";
require      "Release_raw.php";

/********************************************************************
 * Release_rawModel inherits MusicbrainzDB and provides functions to
 * map Release_raw class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Release_raw by id
     *
     * @return release_raw
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "title,".
                      "artist,".
                      "added,".
                      "last_modified,".
                      "lookup_count,".
                      "modify_count,".
                      "source,".
                      "barcode,".
                      "comment ".                      		               
	       "FROM release_raw ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Release_raw"));
    }

    /*********************************************************
     * Insert a new Release_raw into musicbrainz database
     *
     * @param $release_raw
     * @return n/a
     *********************************************************
     */
    public function insert($release_raw)
    {
        $query="INSERT INTO release_raw ( ".
	              "id,".
                      "title,".
                      "artist,".
                      "added,".
                      "last_modified,".
                      "lookup_count,".
                      "modify_count,".
                      "source,".
                      "barcode,".
                      "comment ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_raw->title)."',".
                      "'".$this->sqlSafe($release_raw->artist)."',".
                      "'".$this->sqlSafe($release_raw->added)."',".
                      "'".$this->sqlSafe($release_raw->last_modified)."',".
                      " ".$release_raw->lookup_count." ,".
                      " ".$release_raw->modify_count." ,".
                      " ".$release_raw->source." ,".
                      "'".$this->sqlSafe($release_raw->barcode)."',".
                      "'".$this->sqlSafe($release_raw->comment)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Release_raw into musicbrainz database
     * and return a Release_raw with new autoincrement
     * primary key
     *
     * @param  $release_raw
     * @return $release_raw
     *********************************************************
     */
    public function insert2($release_raw)
    {
        $query="INSERT INTO release_raw ( ".
	              "id,".
                      "title,".
                      "artist,".
                      "added,".
                      "last_modified,".
                      "lookup_count,".
                      "modify_count,".
                      "source,".
                      "barcode,".
                      "comment ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_raw->title)."',".
                      "'".$this->sqlSafe($release_raw->artist)."',".
                      "'".$this->sqlSafe($release_raw->added)."',".
                      "'".$this->sqlSafe($release_raw->last_modified)."',".
                      " ".$release_raw->lookup_count." ,".
                      " ".$release_raw->modify_count." ,".
                      " ".$release_raw->source." ,".
                      "'".$this->sqlSafe($release_raw->barcode)."',".
                      "'".$this->sqlSafe($release_raw->comment)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $release_raw->id = $id;
	    return($release_raw);	
    }


    /*********************************************************
     * Update a Release_raw in musicbrainz database
     *
     * @param $release_raw
     * @return n/a
     *********************************************************
     */
    public function update($release_raw)
    {
        $query="UPDATE  release_raw ".
	          "SET ".
                      "id= ".$release_raw->id." ,".
                      "title='".$this->sqlSafe($release_raw->title)."',".
                      "artist='".$this->sqlSafe($release_raw->artist)."',".
                      "added='".$this->sqlSafe($release_raw->added)."',".
                      "last_modified='".$this->sqlSafe($release_raw->last_modified)."',".
                      "lookup_count= ".$release_raw->lookup_count." ,".
                      "modify_count= ".$release_raw->modify_count." ,".
                      "source= ".$release_raw->source." ,".
                      "barcode='".$this->sqlSafe($release_raw->barcode)."',".
                      "comment='".$this->sqlSafe($release_raw->comment)."' ".                      
	          "WHERE id=".$release_raw->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Release_raw by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM release_raw WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>