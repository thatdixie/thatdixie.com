<?php
require_once "MusicbrainzDB.php";
require      "Link_attribute_type.php";

/********************************************************************
 * Link_attribute_typeModel inherits MusicbrainzDB and provides functions to
 * map Link_attribute_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Link_attribute_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Link_attribute_type by id
     *
     * @return link_attribute_type
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "parent,".
                      "root,".
                      "child_order,".
                      "gid,".
                      "name,".
                      "description,".
                      "last_updated ".                      		               
	       "FROM link_attribute_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Link_attribute_type"));
    }

    /*********************************************************
     * Insert a new Link_attribute_type into musicbrainz database
     *
     * @param $link_attribute_type
     * @return n/a
     *********************************************************
     */
    public function insert($link_attribute_type)
    {
        $query="INSERT INTO link_attribute_type ( ".
	              "id,".
                      "parent,".
                      "root,".
                      "child_order,".
                      "gid,".
                      "name,".
                      "description,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$link_attribute_type->parent." ,".
                      " ".$link_attribute_type->root." ,".
                      " ".$link_attribute_type->child_order." ,".
                      "'".$this->sqlSafe($link_attribute_type->gid)."',".
                      "'".$this->sqlSafe($link_attribute_type->name)."',".
                      "'".$this->sqlSafe($link_attribute_type->description)."',".
                      "'".$this->sqlSafe($link_attribute_type->last_updated)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Link_attribute_type into musicbrainz database
     * and return a Link_attribute_type with new autoincrement
     * primary key
     *
     * @param  $link_attribute_type
     * @return $link_attribute_type
     *********************************************************
     */
    public function insert2($link_attribute_type)
    {
        $query="INSERT INTO link_attribute_type ( ".
	              "id,".
                      "parent,".
                      "root,".
                      "child_order,".
                      "gid,".
                      "name,".
                      "description,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$link_attribute_type->parent." ,".
                      " ".$link_attribute_type->root." ,".
                      " ".$link_attribute_type->child_order." ,".
                      "'".$this->sqlSafe($link_attribute_type->gid)."',".
                      "'".$this->sqlSafe($link_attribute_type->name)."',".
                      "'".$this->sqlSafe($link_attribute_type->description)."',".
                      "'".$this->sqlSafe($link_attribute_type->last_updated)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $link_attribute_type->id = $id;
	    return($link_attribute_type);	
    }


    /*********************************************************
     * Update a Link_attribute_type in musicbrainz database
     *
     * @param $link_attribute_type
     * @return n/a
     *********************************************************
     */
    public function update($link_attribute_type)
    {
        $query="UPDATE  link_attribute_type ".
	          "SET ".
                      "id= ".$link_attribute_type->id." ,".
                      "parent= ".$link_attribute_type->parent." ,".
                      "root= ".$link_attribute_type->root." ,".
                      "child_order= ".$link_attribute_type->child_order." ,".
                      "gid='".$this->sqlSafe($link_attribute_type->gid)."',".
                      "name='".$this->sqlSafe($link_attribute_type->name)."',".
                      "description='".$this->sqlSafe($link_attribute_type->description)."',".
                      "last_updated='".$this->sqlSafe($link_attribute_type->last_updated)."' ".                      
	          "WHERE id=".$link_attribute_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Link_attribute_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM link_attribute_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>