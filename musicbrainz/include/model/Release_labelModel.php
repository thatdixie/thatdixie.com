<?php
require_once "MusicbrainzDB.php";
require      "Release_label.php";

/********************************************************************
 * Release_labelModel inherits MusicbrainzDB and provides functions to
 * map Release_label class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_labelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Release_label by id
     *
     * @return release_label
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "release,".
                      "label,".
                      "catalog_number,".
                      "last_updated ".                      		               
	       "FROM release_label ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Release_label"));
    }

    /*********************************************************
     * Insert a new Release_label into musicbrainz database
     *
     * @param $release_label
     * @return n/a
     *********************************************************
     */
    public function insert($release_label)
    {
        $query="INSERT INTO release_label ( ".
	              "id,".
                      "release,".
                      "label,".
                      "catalog_number,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$release_label->release." ,".
                      " ".$release_label->label." ,".
                      "'".$this->sqlSafe($release_label->catalog_number)."',".
                      "'".$this->sqlSafe($release_label->last_updated)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Release_label into musicbrainz database
     * and return a Release_label with new autoincrement
     * primary key
     *
     * @param  $release_label
     * @return $release_label
     *********************************************************
     */
    public function insert2($release_label)
    {
        $query="INSERT INTO release_label ( ".
	              "id,".
                      "release,".
                      "label,".
                      "catalog_number,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$release_label->release." ,".
                      " ".$release_label->label." ,".
                      "'".$this->sqlSafe($release_label->catalog_number)."',".
                      "'".$this->sqlSafe($release_label->last_updated)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $release_label->id = $id;
	    return($release_label);	
    }


    /*********************************************************
     * Update a Release_label in musicbrainz database
     *
     * @param $release_label
     * @return n/a
     *********************************************************
     */
    public function update($release_label)
    {
        $query="UPDATE  release_label ".
	          "SET ".
                      "id= ".$release_label->id." ,".
                      "release= ".$release_label->release." ,".
                      "label= ".$release_label->label." ,".
                      "catalog_number='".$this->sqlSafe($release_label->catalog_number)."',".
                      "last_updated='".$this->sqlSafe($release_label->last_updated)."' ".                      
	          "WHERE id=".$release_label->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Release_label by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM release_label WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>