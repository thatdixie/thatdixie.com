<?php
require_once "MusicbrainzDB.php";
require      "Application.php";

/********************************************************************
 * ApplicationModel inherits MusicbrainzDB and provides functions to
 * map Application class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class ApplicationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Application by id
     *
     * @return application
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "owner,".
                      "name,".
                      "oauth_id,".
                      "oauth_secret,".
                      "oauth_redirect_uri ".                      		               
	       "FROM application ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Application"));
    }

    /*********************************************************
     * Insert a new Application into musicbrainz database
     *
     * @param $application
     * @return n/a
     *********************************************************
     */
    public function insert($application)
    {
        $query="INSERT INTO application ( ".
	              "id,".
                      "owner,".
                      "name,".
                      "oauth_id,".
                      "oauth_secret,".
                      "oauth_redirect_uri ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$application->owner." ,".
                      "'".$this->sqlSafe($application->name)."',".
                      "'".$this->sqlSafe($application->oauth_id)."',".
                      "'".$this->sqlSafe($application->oauth_secret)."',".
                      "'".$this->sqlSafe($application->oauth_redirect_uri)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Application into musicbrainz database
     * and return a Application with new autoincrement
     * primary key
     *
     * @param  $application
     * @return $application
     *********************************************************
     */
    public function insert2($application)
    {
        $query="INSERT INTO application ( ".
	              "id,".
                      "owner,".
                      "name,".
                      "oauth_id,".
                      "oauth_secret,".
                      "oauth_redirect_uri ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$application->owner." ,".
                      "'".$this->sqlSafe($application->name)."',".
                      "'".$this->sqlSafe($application->oauth_id)."',".
                      "'".$this->sqlSafe($application->oauth_secret)."',".
                      "'".$this->sqlSafe($application->oauth_redirect_uri)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $application->id = $id;
	    return($application);	
    }


    /*********************************************************
     * Update a Application in musicbrainz database
     *
     * @param $application
     * @return n/a
     *********************************************************
     */
    public function update($application)
    {
        $query="UPDATE  application ".
	          "SET ".
                      "id= ".$application->id." ,".
                      "owner= ".$application->owner." ,".
                      "name='".$this->sqlSafe($application->name)."',".
                      "oauth_id='".$this->sqlSafe($application->oauth_id)."',".
                      "oauth_secret='".$this->sqlSafe($application->oauth_secret)."',".
                      "oauth_redirect_uri='".$this->sqlSafe($application->oauth_redirect_uri)."' ".                      
	          "WHERE id=".$application->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Application by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM application WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>