<?php
require_once "MusicbrainzDB.php";
require      "Alternative_release_type.php";

/********************************************************************
 * Alternative_release_typeModel inherits MusicbrainzDB and provides functions to
 * map Alternative_release_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Alternative_release_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Alternative_release_type by id
     *
     * @return alternative_release_type
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      		               
	       "FROM alternative_release_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Alternative_release_type"));
    }

    /*********************************************************
     * Insert a new Alternative_release_type into musicbrainz database
     *
     * @param $alternative_release_type
     * @return n/a
     *********************************************************
     */
    public function insert($alternative_release_type)
    {
        $query="INSERT INTO alternative_release_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($alternative_release_type->name)."',".
                      " ".$alternative_release_type->parent." ,".
                      " ".$alternative_release_type->child_order." ,".
                      "'".$this->sqlSafe($alternative_release_type->description)."',".
                      "'".$this->sqlSafe($alternative_release_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Alternative_release_type into musicbrainz database
     * and return a Alternative_release_type with new autoincrement
     * primary key
     *
     * @param  $alternative_release_type
     * @return $alternative_release_type
     *********************************************************
     */
    public function insert2($alternative_release_type)
    {
        $query="INSERT INTO alternative_release_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($alternative_release_type->name)."',".
                      " ".$alternative_release_type->parent." ,".
                      " ".$alternative_release_type->child_order." ,".
                      "'".$this->sqlSafe($alternative_release_type->description)."',".
                      "'".$this->sqlSafe($alternative_release_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $alternative_release_type->id = $id;
	    return($alternative_release_type);	
    }


    /*********************************************************
     * Update a Alternative_release_type in musicbrainz database
     *
     * @param $alternative_release_type
     * @return n/a
     *********************************************************
     */
    public function update($alternative_release_type)
    {
        $query="UPDATE  alternative_release_type ".
	          "SET ".
                      "id= ".$alternative_release_type->id." ,".
                      "name='".$this->sqlSafe($alternative_release_type->name)."',".
                      "parent= ".$alternative_release_type->parent." ,".
                      "child_order= ".$alternative_release_type->child_order." ,".
                      "description='".$this->sqlSafe($alternative_release_type->description)."',".
                      "gid='".$this->sqlSafe($alternative_release_type->gid)."' ".                      
	          "WHERE id=".$alternative_release_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Alternative_release_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM alternative_release_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>