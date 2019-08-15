<?php
require_once "MusicbrainzDB.php";
require      "Url.php";

/********************************************************************
 * UrlModel inherits MusicbrainzDB and provides functions to
 * map Url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class UrlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Url by id
     *
     * @return url
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "url,".
                      "edits_pending,".
                      "last_updated ".                      		               
	       "FROM url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Url"));
    }

    /*********************************************************
     * Insert a new Url into musicbrainz database
     *
     * @param $url
     * @return n/a
     *********************************************************
     */
    public function insert($url)
    {
        $query="INSERT INTO url ( ".
	              "id,".
                      "gid,".
                      "url,".
                      "edits_pending,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($url->gid)."',".
                      "'".$this->sqlSafe($url->url)."',".
                      " ".$url->edits_pending." ,".
                      "'".$this->sqlSafe($url->last_updated)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Url into musicbrainz database
     * and return a Url with new autoincrement
     * primary key
     *
     * @param  $url
     * @return $url
     *********************************************************
     */
    public function insert2($url)
    {
        $query="INSERT INTO url ( ".
	              "id,".
                      "gid,".
                      "url,".
                      "edits_pending,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($url->gid)."',".
                      "'".$this->sqlSafe($url->url)."',".
                      " ".$url->edits_pending." ,".
                      "'".$this->sqlSafe($url->last_updated)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $url->id = $id;
	    return($url);	
    }


    /*********************************************************
     * Update a Url in musicbrainz database
     *
     * @param $url
     * @return n/a
     *********************************************************
     */
    public function update($url)
    {
        $query="UPDATE  url ".
	          "SET ".
                      "id= ".$url->id." ,".
                      "gid='".$this->sqlSafe($url->gid)."',".
                      "url='".$this->sqlSafe($url->url)."',".
                      "edits_pending= ".$url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($url->last_updated)."' ".                      
	          "WHERE id=".$url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>