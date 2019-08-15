<?php
require_once "MusicbrainzDB.php";
require      "Link_type.php";

/********************************************************************
 * Link_typeModel inherits MusicbrainzDB and provides functions to
 * map Link_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Link_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Link_type by id
     *
     * @return link_type
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "parent,".
                      "child_order,".
                      "gid,".
                      "entity_type0,".
                      "entity_type1,".
                      "name,".
                      "description,".
                      "link_phrase,".
                      "reverse_link_phrase,".
                      "long_link_phrase,".
                      "priority,".
                      "last_updated,".
                      "is_deprecated,".
                      "has_dates,".
                      "entity0_cardinality,".
                      "entity1_cardinality ".                      		               
	       "FROM link_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Link_type"));
    }

    /*********************************************************
     * Insert a new Link_type into musicbrainz database
     *
     * @param $link_type
     * @return n/a
     *********************************************************
     */
    public function insert($link_type)
    {
        $query="INSERT INTO link_type ( ".
	              "id,".
                      "parent,".
                      "child_order,".
                      "gid,".
                      "entity_type0,".
                      "entity_type1,".
                      "name,".
                      "description,".
                      "link_phrase,".
                      "reverse_link_phrase,".
                      "long_link_phrase,".
                      "priority,".
                      "last_updated,".
                      "is_deprecated,".
                      "has_dates,".
                      "entity0_cardinality,".
                      "entity1_cardinality ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$link_type->parent." ,".
                      " ".$link_type->child_order." ,".
                      "'".$this->sqlSafe($link_type->gid)."',".
                      "'".$this->sqlSafe($link_type->entity_type0)."',".
                      "'".$this->sqlSafe($link_type->entity_type1)."',".
                      "'".$this->sqlSafe($link_type->name)."',".
                      "'".$this->sqlSafe($link_type->description)."',".
                      "'".$this->sqlSafe($link_type->link_phrase)."',".
                      "'".$this->sqlSafe($link_type->reverse_link_phrase)."',".
                      "'".$this->sqlSafe($link_type->long_link_phrase)."',".
                      " ".$link_type->priority." ,".
                      "'".$this->sqlSafe($link_type->last_updated)."',".
                      "'".$this->sqlSafe($link_type->is_deprecated)."',".
                      "'".$this->sqlSafe($link_type->has_dates)."',".
                      " ".$link_type->entity0_cardinality." ,".
                      " ".$link_type->entity1_cardinality."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Link_type into musicbrainz database
     * and return a Link_type with new autoincrement
     * primary key
     *
     * @param  $link_type
     * @return $link_type
     *********************************************************
     */
    public function insert2($link_type)
    {
        $query="INSERT INTO link_type ( ".
	              "id,".
                      "parent,".
                      "child_order,".
                      "gid,".
                      "entity_type0,".
                      "entity_type1,".
                      "name,".
                      "description,".
                      "link_phrase,".
                      "reverse_link_phrase,".
                      "long_link_phrase,".
                      "priority,".
                      "last_updated,".
                      "is_deprecated,".
                      "has_dates,".
                      "entity0_cardinality,".
                      "entity1_cardinality ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$link_type->parent." ,".
                      " ".$link_type->child_order." ,".
                      "'".$this->sqlSafe($link_type->gid)."',".
                      "'".$this->sqlSafe($link_type->entity_type0)."',".
                      "'".$this->sqlSafe($link_type->entity_type1)."',".
                      "'".$this->sqlSafe($link_type->name)."',".
                      "'".$this->sqlSafe($link_type->description)."',".
                      "'".$this->sqlSafe($link_type->link_phrase)."',".
                      "'".$this->sqlSafe($link_type->reverse_link_phrase)."',".
                      "'".$this->sqlSafe($link_type->long_link_phrase)."',".
                      " ".$link_type->priority." ,".
                      "'".$this->sqlSafe($link_type->last_updated)."',".
                      "'".$this->sqlSafe($link_type->is_deprecated)."',".
                      "'".$this->sqlSafe($link_type->has_dates)."',".
                      " ".$link_type->entity0_cardinality." ,".
                      " ".$link_type->entity1_cardinality."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $link_type->id = $id;
	    return($link_type);	
    }


    /*********************************************************
     * Update a Link_type in musicbrainz database
     *
     * @param $link_type
     * @return n/a
     *********************************************************
     */
    public function update($link_type)
    {
        $query="UPDATE  link_type ".
	          "SET ".
                      "id= ".$link_type->id." ,".
                      "parent= ".$link_type->parent." ,".
                      "child_order= ".$link_type->child_order." ,".
                      "gid='".$this->sqlSafe($link_type->gid)."',".
                      "entity_type0='".$this->sqlSafe($link_type->entity_type0)."',".
                      "entity_type1='".$this->sqlSafe($link_type->entity_type1)."',".
                      "name='".$this->sqlSafe($link_type->name)."',".
                      "description='".$this->sqlSafe($link_type->description)."',".
                      "link_phrase='".$this->sqlSafe($link_type->link_phrase)."',".
                      "reverse_link_phrase='".$this->sqlSafe($link_type->reverse_link_phrase)."',".
                      "long_link_phrase='".$this->sqlSafe($link_type->long_link_phrase)."',".
                      "priority= ".$link_type->priority." ,".
                      "last_updated='".$this->sqlSafe($link_type->last_updated)."',".
                      "is_deprecated='".$this->sqlSafe($link_type->is_deprecated)."',".
                      "has_dates='".$this->sqlSafe($link_type->has_dates)."',".
                      "entity0_cardinality= ".$link_type->entity0_cardinality." ,".
                      "entity1_cardinality= ".$link_type->entity1_cardinality."  ".                      
	          "WHERE id=".$link_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Link_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM link_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>