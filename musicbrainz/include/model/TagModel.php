<?php
require_once "MusicbrainzDB.php";
require      "Tag.php";

/********************************************************************
 * TagModel inherits MusicbrainzDB and provides functions to
 * map Tag class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class TagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Tag by id
     *
     * @return tag
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "ref_count ".                      		               
	       "FROM tag ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Tag"));
    }

    /*********************************************************
     * Insert a new Tag into musicbrainz database
     *
     * @param $tag
     * @return n/a
     *********************************************************
     */
    public function insert($tag)
    {
        $query="INSERT INTO tag ( ".
	              "id,".
                      "name,".
                      "ref_count ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($tag->name)."',".
                      " ".$tag->ref_count."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Tag into musicbrainz database
     * and return a Tag with new autoincrement
     * primary key
     *
     * @param  $tag
     * @return $tag
     *********************************************************
     */
    public function insert2($tag)
    {
        $query="INSERT INTO tag ( ".
	              "id,".
                      "name,".
                      "ref_count ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($tag->name)."',".
                      " ".$tag->ref_count."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $tag->id = $id;
	    return($tag);	
    }


    /*********************************************************
     * Update a Tag in musicbrainz database
     *
     * @param $tag
     * @return n/a
     *********************************************************
     */
    public function update($tag)
    {
        $query="UPDATE  tag ".
	          "SET ".
                      "id= ".$tag->id." ,".
                      "name='".$this->sqlSafe($tag->name)."',".
                      "ref_count= ".$tag->ref_count."  ".                      
	          "WHERE id=".$tag->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Tag by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM tag WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>