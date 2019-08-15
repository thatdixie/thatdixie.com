<?php
require_once "MusicbrainzDB.php";
require      "Series.php";

/********************************************************************
 * SeriesModel inherits MusicbrainzDB and provides functions to
 * map Series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class SeriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Series by id
     *
     * @return series
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "comment,".
                      "type,".
                      "ordering_attribute,".
                      "ordering_type,".
                      "edits_pending,".
                      "last_updated ".                      		               
	       "FROM series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Series"));
    }

    /*********************************************************
     * Insert a new Series into musicbrainz database
     *
     * @param $series
     * @return n/a
     *********************************************************
     */
    public function insert($series)
    {
        $query="INSERT INTO series ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "comment,".
                      "type,".
                      "ordering_attribute,".
                      "ordering_type,".
                      "edits_pending,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($series->gid)."',".
                      "'".$this->sqlSafe($series->name)."',".
                      "'".$this->sqlSafe($series->comment)."',".
                      " ".$series->type." ,".
                      " ".$series->ordering_attribute." ,".
                      " ".$series->ordering_type." ,".
                      " ".$series->edits_pending." ,".
                      "'".$this->sqlSafe($series->last_updated)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Series into musicbrainz database
     * and return a Series with new autoincrement
     * primary key
     *
     * @param  $series
     * @return $series
     *********************************************************
     */
    public function insert2($series)
    {
        $query="INSERT INTO series ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "comment,".
                      "type,".
                      "ordering_attribute,".
                      "ordering_type,".
                      "edits_pending,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($series->gid)."',".
                      "'".$this->sqlSafe($series->name)."',".
                      "'".$this->sqlSafe($series->comment)."',".
                      " ".$series->type." ,".
                      " ".$series->ordering_attribute." ,".
                      " ".$series->ordering_type." ,".
                      " ".$series->edits_pending." ,".
                      "'".$this->sqlSafe($series->last_updated)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $series->id = $id;
	    return($series);	
    }


    /*********************************************************
     * Update a Series in musicbrainz database
     *
     * @param $series
     * @return n/a
     *********************************************************
     */
    public function update($series)
    {
        $query="UPDATE  series ".
	          "SET ".
                      "id= ".$series->id." ,".
                      "gid='".$this->sqlSafe($series->gid)."',".
                      "name='".$this->sqlSafe($series->name)."',".
                      "comment='".$this->sqlSafe($series->comment)."',".
                      "type= ".$series->type." ,".
                      "ordering_attribute= ".$series->ordering_attribute." ,".
                      "ordering_type= ".$series->ordering_type." ,".
                      "edits_pending= ".$series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($series->last_updated)."' ".                      
	          "WHERE id=".$series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>