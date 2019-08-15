<?php
require_once "MusicbrainzDB.php";
require      "Medium_format.php";

/********************************************************************
 * Medium_formatModel inherits MusicbrainzDB and provides functions to
 * map Medium_format class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Medium_formatModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Medium_format by id
     *
     * @return medium_format
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "year,".
                      "has_discids,".
                      "description,".
                      "gid ".                      		               
	       "FROM medium_format ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Medium_format"));
    }

    /*********************************************************
     * Insert a new Medium_format into musicbrainz database
     *
     * @param $medium_format
     * @return n/a
     *********************************************************
     */
    public function insert($medium_format)
    {
        $query="INSERT INTO medium_format ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "year,".
                      "has_discids,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($medium_format->name)."',".
                      " ".$medium_format->parent." ,".
                      " ".$medium_format->child_order." ,".
                      " ".$medium_format->year." ,".
                      "'".$this->sqlSafe($medium_format->has_discids)."',".
                      "'".$this->sqlSafe($medium_format->description)."',".
                      "'".$this->sqlSafe($medium_format->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Medium_format into musicbrainz database
     * and return a Medium_format with new autoincrement
     * primary key
     *
     * @param  $medium_format
     * @return $medium_format
     *********************************************************
     */
    public function insert2($medium_format)
    {
        $query="INSERT INTO medium_format ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "year,".
                      "has_discids,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($medium_format->name)."',".
                      " ".$medium_format->parent." ,".
                      " ".$medium_format->child_order." ,".
                      " ".$medium_format->year." ,".
                      "'".$this->sqlSafe($medium_format->has_discids)."',".
                      "'".$this->sqlSafe($medium_format->description)."',".
                      "'".$this->sqlSafe($medium_format->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $medium_format->id = $id;
	    return($medium_format);	
    }


    /*********************************************************
     * Update a Medium_format in musicbrainz database
     *
     * @param $medium_format
     * @return n/a
     *********************************************************
     */
    public function update($medium_format)
    {
        $query="UPDATE  medium_format ".
	          "SET ".
                      "id= ".$medium_format->id." ,".
                      "name='".$this->sqlSafe($medium_format->name)."',".
                      "parent= ".$medium_format->parent." ,".
                      "child_order= ".$medium_format->child_order." ,".
                      "year= ".$medium_format->year." ,".
                      "has_discids='".$this->sqlSafe($medium_format->has_discids)."',".
                      "description='".$this->sqlSafe($medium_format->description)."',".
                      "gid='".$this->sqlSafe($medium_format->gid)."' ".                      
	          "WHERE id=".$medium_format->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Medium_format by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM medium_format WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>