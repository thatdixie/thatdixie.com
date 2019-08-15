<?php
require_once "MusicbrainzDB.php";
require      "Editor_oauth_token.php";

/********************************************************************
 * Editor_oauth_tokenModel inherits MusicbrainzDB and provides functions to
 * map Editor_oauth_token class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_oauth_tokenModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Editor_oauth_token by id
     *
     * @return editor_oauth_token
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "application,".
                      "authorization_code,".
                      "refresh_token,".
                      "access_token,".
                      "expire_time,".
                      "scope,".
                      "granted ".                      		               
	       "FROM editor_oauth_token ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Editor_oauth_token"));
    }

    /*********************************************************
     * Insert a new Editor_oauth_token into musicbrainz database
     *
     * @param $editor_oauth_token
     * @return n/a
     *********************************************************
     */
    public function insert($editor_oauth_token)
    {
        $query="INSERT INTO editor_oauth_token ( ".
	              "id,".
                      "editor,".
                      "application,".
                      "authorization_code,".
                      "refresh_token,".
                      "access_token,".
                      "expire_time,".
                      "scope,".
                      "granted ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_oauth_token->editor." ,".
                      " ".$editor_oauth_token->application." ,".
                      "'".$this->sqlSafe($editor_oauth_token->authorization_code)."',".
                      "'".$this->sqlSafe($editor_oauth_token->refresh_token)."',".
                      "'".$this->sqlSafe($editor_oauth_token->access_token)."',".
                      "'".$this->sqlSafe($editor_oauth_token->expire_time)."',".
                      " ".$editor_oauth_token->scope." ,".
                      "'".$this->sqlSafe($editor_oauth_token->granted)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Editor_oauth_token into musicbrainz database
     * and return a Editor_oauth_token with new autoincrement
     * primary key
     *
     * @param  $editor_oauth_token
     * @return $editor_oauth_token
     *********************************************************
     */
    public function insert2($editor_oauth_token)
    {
        $query="INSERT INTO editor_oauth_token ( ".
	              "id,".
                      "editor,".
                      "application,".
                      "authorization_code,".
                      "refresh_token,".
                      "access_token,".
                      "expire_time,".
                      "scope,".
                      "granted ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_oauth_token->editor." ,".
                      " ".$editor_oauth_token->application." ,".
                      "'".$this->sqlSafe($editor_oauth_token->authorization_code)."',".
                      "'".$this->sqlSafe($editor_oauth_token->refresh_token)."',".
                      "'".$this->sqlSafe($editor_oauth_token->access_token)."',".
                      "'".$this->sqlSafe($editor_oauth_token->expire_time)."',".
                      " ".$editor_oauth_token->scope." ,".
                      "'".$this->sqlSafe($editor_oauth_token->granted)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $editor_oauth_token->id = $id;
	    return($editor_oauth_token);	
    }


    /*********************************************************
     * Update a Editor_oauth_token in musicbrainz database
     *
     * @param $editor_oauth_token
     * @return n/a
     *********************************************************
     */
    public function update($editor_oauth_token)
    {
        $query="UPDATE  editor_oauth_token ".
	          "SET ".
                      "id= ".$editor_oauth_token->id." ,".
                      "editor= ".$editor_oauth_token->editor." ,".
                      "application= ".$editor_oauth_token->application." ,".
                      "authorization_code='".$this->sqlSafe($editor_oauth_token->authorization_code)."',".
                      "refresh_token='".$this->sqlSafe($editor_oauth_token->refresh_token)."',".
                      "access_token='".$this->sqlSafe($editor_oauth_token->access_token)."',".
                      "expire_time='".$this->sqlSafe($editor_oauth_token->expire_time)."',".
                      "scope= ".$editor_oauth_token->scope." ,".
                      "granted='".$this->sqlSafe($editor_oauth_token->granted)."' ".                      
	          "WHERE id=".$editor_oauth_token->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Editor_oauth_token by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM editor_oauth_token WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>