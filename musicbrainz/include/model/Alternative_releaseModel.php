<?php
require_once "MusicbrainzDB.php";
require      "Alternative_release.php";

/********************************************************************
 * Alternative_releaseModel inherits MusicbrainzDB and provides functions to
 * map Alternative_release class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Alternative_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Alternative_release by id
     *
     * @return alternative_release
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "release,".
                      "name,".
                      "artist_credit,".
                      "type,".
                      "language,".
                      "script,".
                      "comment ".                      		               
	       "FROM alternative_release ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Alternative_release"));
    }

    /*********************************************************
     * Insert a new Alternative_release into musicbrainz database
     *
     * @param $alternative_release
     * @return n/a
     *********************************************************
     */
    public function insert($alternative_release)
    {
        $query="INSERT INTO alternative_release ( ".
	              "id,".
                      "gid,".
                      "release,".
                      "name,".
                      "artist_credit,".
                      "type,".
                      "language,".
                      "script,".
                      "comment ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($alternative_release->gid)."',".
                      " ".$alternative_release->release." ,".
                      "'".$this->sqlSafe($alternative_release->name)."',".
                      " ".$alternative_release->artist_credit." ,".
                      " ".$alternative_release->type." ,".
                      " ".$alternative_release->language." ,".
                      " ".$alternative_release->script." ,".
                      "'".$this->sqlSafe($alternative_release->comment)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Alternative_release into musicbrainz database
     * and return a Alternative_release with new autoincrement
     * primary key
     *
     * @param  $alternative_release
     * @return $alternative_release
     *********************************************************
     */
    public function insert2($alternative_release)
    {
        $query="INSERT INTO alternative_release ( ".
	              "id,".
                      "gid,".
                      "release,".
                      "name,".
                      "artist_credit,".
                      "type,".
                      "language,".
                      "script,".
                      "comment ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($alternative_release->gid)."',".
                      " ".$alternative_release->release." ,".
                      "'".$this->sqlSafe($alternative_release->name)."',".
                      " ".$alternative_release->artist_credit." ,".
                      " ".$alternative_release->type." ,".
                      " ".$alternative_release->language." ,".
                      " ".$alternative_release->script." ,".
                      "'".$this->sqlSafe($alternative_release->comment)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $alternative_release->id = $id;
	    return($alternative_release);	
    }


    /*********************************************************
     * Update a Alternative_release in musicbrainz database
     *
     * @param $alternative_release
     * @return n/a
     *********************************************************
     */
    public function update($alternative_release)
    {
        $query="UPDATE  alternative_release ".
	          "SET ".
                      "id= ".$alternative_release->id." ,".
                      "gid='".$this->sqlSafe($alternative_release->gid)."',".
                      "release= ".$alternative_release->release." ,".
                      "name='".$this->sqlSafe($alternative_release->name)."',".
                      "artist_credit= ".$alternative_release->artist_credit." ,".
                      "type= ".$alternative_release->type." ,".
                      "language= ".$alternative_release->language." ,".
                      "script= ".$alternative_release->script." ,".
                      "comment='".$this->sqlSafe($alternative_release->comment)."' ".                      
	          "WHERE id=".$alternative_release->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Alternative_release by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM alternative_release WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>