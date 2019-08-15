<?php
require_once "MusicbrainzDB.php";
require      "Gender.php";

/********************************************************************
 * GenderModel inherits MusicbrainzDB and provides functions to
 * map Gender class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class GenderModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Gender by id
     *
     * @return gender
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
	       "FROM gender ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Gender"));
    }

    /*********************************************************
     * Insert a new Gender into musicbrainz database
     *
     * @param $gender
     * @return n/a
     *********************************************************
     */
    public function insert($gender)
    {
        $query="INSERT INTO gender ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($gender->name)."',".
                      " ".$gender->parent." ,".
                      " ".$gender->child_order." ,".
                      "'".$this->sqlSafe($gender->description)."',".
                      "'".$this->sqlSafe($gender->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Gender into musicbrainz database
     * and return a Gender with new autoincrement
     * primary key
     *
     * @param  $gender
     * @return $gender
     *********************************************************
     */
    public function insert2($gender)
    {
        $query="INSERT INTO gender ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($gender->name)."',".
                      " ".$gender->parent." ,".
                      " ".$gender->child_order." ,".
                      "'".$this->sqlSafe($gender->description)."',".
                      "'".$this->sqlSafe($gender->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $gender->id = $id;
	    return($gender);	
    }


    /*********************************************************
     * Update a Gender in musicbrainz database
     *
     * @param $gender
     * @return n/a
     *********************************************************
     */
    public function update($gender)
    {
        $query="UPDATE  gender ".
	          "SET ".
                      "id= ".$gender->id." ,".
                      "name='".$this->sqlSafe($gender->name)."',".
                      "parent= ".$gender->parent." ,".
                      "child_order= ".$gender->child_order." ,".
                      "description='".$this->sqlSafe($gender->description)."',".
                      "gid='".$this->sqlSafe($gender->gid)."' ".                      
	          "WHERE id=".$gender->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Gender by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM gender WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>