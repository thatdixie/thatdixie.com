<?php
require_once "MusicbrainzDB.php";
require      "Artist_credit.php";

/********************************************************************
 * Artist_creditModel inherits MusicbrainzDB and provides functions to
 * map Artist_credit class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_creditModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Artist_credit by id
     *
     * @return artist_credit
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "artist_count,".
                      "ref_count,".
                      "created ".                      		               
	       "FROM artist_credit ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Artist_credit"));
    }

    /*********************************************************
     * Insert a new Artist_credit into musicbrainz database
     *
     * @param $artist_credit
     * @return n/a
     *********************************************************
     */
    public function insert($artist_credit)
    {
        $query="INSERT INTO artist_credit ( ".
	              "id,".
                      "name,".
                      "artist_count,".
                      "ref_count,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($artist_credit->name)."',".
                      " ".$artist_credit->artist_count." ,".
                      " ".$artist_credit->ref_count." ,".
                      "'".$this->sqlSafe($artist_credit->created)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Artist_credit into musicbrainz database
     * and return a Artist_credit with new autoincrement
     * primary key
     *
     * @param  $artist_credit
     * @return $artist_credit
     *********************************************************
     */
    public function insert2($artist_credit)
    {
        $query="INSERT INTO artist_credit ( ".
	              "id,".
                      "name,".
                      "artist_count,".
                      "ref_count,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($artist_credit->name)."',".
                      " ".$artist_credit->artist_count." ,".
                      " ".$artist_credit->ref_count." ,".
                      "'".$this->sqlSafe($artist_credit->created)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $artist_credit->id = $id;
	    return($artist_credit);	
    }


    /*********************************************************
     * Update a Artist_credit in musicbrainz database
     *
     * @param $artist_credit
     * @return n/a
     *********************************************************
     */
    public function update($artist_credit)
    {
        $query="UPDATE  artist_credit ".
	          "SET ".
                      "id= ".$artist_credit->id." ,".
                      "name='".$this->sqlSafe($artist_credit->name)."',".
                      "artist_count= ".$artist_credit->artist_count." ,".
                      "ref_count= ".$artist_credit->ref_count." ,".
                      "created='".$this->sqlSafe($artist_credit->created)."' ".                      
	          "WHERE id=".$artist_credit->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Artist_credit by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM artist_credit WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>