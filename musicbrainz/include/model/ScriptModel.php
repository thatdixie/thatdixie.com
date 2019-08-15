<?php
require_once "MusicbrainzDB.php";
require      "Script.php";

/********************************************************************
 * ScriptModel inherits MusicbrainzDB and provides functions to
 * map Script class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class ScriptModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Script by id
     *
     * @return script
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "iso_code,".
                      "iso_number,".
                      "name,".
                      "frequency ".                      		               
	       "FROM script ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Script"));
    }

    /*********************************************************
     * Insert a new Script into musicbrainz database
     *
     * @param $script
     * @return n/a
     *********************************************************
     */
    public function insert($script)
    {
        $query="INSERT INTO script ( ".
	              "id,".
                      "iso_code,".
                      "iso_number,".
                      "name,".
                      "frequency ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($script->iso_code)."',".
                      "'".$this->sqlSafe($script->iso_number)."',".
                      "'".$this->sqlSafe($script->name)."',".
                      " ".$script->frequency."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Script into musicbrainz database
     * and return a Script with new autoincrement
     * primary key
     *
     * @param  $script
     * @return $script
     *********************************************************
     */
    public function insert2($script)
    {
        $query="INSERT INTO script ( ".
	              "id,".
                      "iso_code,".
                      "iso_number,".
                      "name,".
                      "frequency ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($script->iso_code)."',".
                      "'".$this->sqlSafe($script->iso_number)."',".
                      "'".$this->sqlSafe($script->name)."',".
                      " ".$script->frequency."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $script->id = $id;
	    return($script);	
    }


    /*********************************************************
     * Update a Script in musicbrainz database
     *
     * @param $script
     * @return n/a
     *********************************************************
     */
    public function update($script)
    {
        $query="UPDATE  script ".
	          "SET ".
                      "id= ".$script->id." ,".
                      "iso_code='".$this->sqlSafe($script->iso_code)."',".
                      "iso_number='".$this->sqlSafe($script->iso_number)."',".
                      "name='".$this->sqlSafe($script->name)."',".
                      "frequency= ".$script->frequency."  ".                      
	          "WHERE id=".$script->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Script by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM script WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>