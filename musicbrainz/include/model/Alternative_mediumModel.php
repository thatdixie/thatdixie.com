<?php
require_once "MusicbrainzDB.php";
require      "Alternative_medium.php";

/********************************************************************
 * Alternative_mediumModel inherits MusicbrainzDB and provides functions to
 * map Alternative_medium class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Alternative_mediumModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Alternative_medium by id
     *
     * @return alternative_medium
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "medium,".
                      "alternative_release,".
                      "name ".                      		               
	       "FROM alternative_medium ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Alternative_medium"));
    }

    /*********************************************************
     * Insert a new Alternative_medium into musicbrainz database
     *
     * @param $alternative_medium
     * @return n/a
     *********************************************************
     */
    public function insert($alternative_medium)
    {
        $query="INSERT INTO alternative_medium ( ".
	              "id,".
                      "medium,".
                      "alternative_release,".
                      "name ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$alternative_medium->medium." ,".
                      " ".$alternative_medium->alternative_release." ,".
                      "'".$this->sqlSafe($alternative_medium->name)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Alternative_medium into musicbrainz database
     * and return a Alternative_medium with new autoincrement
     * primary key
     *
     * @param  $alternative_medium
     * @return $alternative_medium
     *********************************************************
     */
    public function insert2($alternative_medium)
    {
        $query="INSERT INTO alternative_medium ( ".
	              "id,".
                      "medium,".
                      "alternative_release,".
                      "name ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$alternative_medium->medium." ,".
                      " ".$alternative_medium->alternative_release." ,".
                      "'".$this->sqlSafe($alternative_medium->name)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $alternative_medium->id = $id;
	    return($alternative_medium);	
    }


    /*********************************************************
     * Update a Alternative_medium in musicbrainz database
     *
     * @param $alternative_medium
     * @return n/a
     *********************************************************
     */
    public function update($alternative_medium)
    {
        $query="UPDATE  alternative_medium ".
	          "SET ".
                      "id= ".$alternative_medium->id." ,".
                      "medium= ".$alternative_medium->medium." ,".
                      "alternative_release= ".$alternative_medium->alternative_release." ,".
                      "name='".$this->sqlSafe($alternative_medium->name)."' ".                      
	          "WHERE id=".$alternative_medium->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Alternative_medium by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM alternative_medium WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>