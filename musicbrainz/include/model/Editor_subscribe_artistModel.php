<?php
require_once "MusicbrainzDB.php";
require      "Editor_subscribe_artist.php";

/********************************************************************
 * Editor_subscribe_artistModel inherits MusicbrainzDB and provides functions to
 * map Editor_subscribe_artist class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_subscribe_artistModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Editor_subscribe_artist by id
     *
     * @return editor_subscribe_artist
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "artist,".
                      "last_edit_sent ".                      		               
	       "FROM editor_subscribe_artist ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Editor_subscribe_artist"));
    }

    /*********************************************************
     * Insert a new Editor_subscribe_artist into musicbrainz database
     *
     * @param $editor_subscribe_artist
     * @return n/a
     *********************************************************
     */
    public function insert($editor_subscribe_artist)
    {
        $query="INSERT INTO editor_subscribe_artist ( ".
	              "id,".
                      "editor,".
                      "artist,".
                      "last_edit_sent ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_artist->editor." ,".
                      " ".$editor_subscribe_artist->artist." ,".
                      " ".$editor_subscribe_artist->last_edit_sent."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Editor_subscribe_artist into musicbrainz database
     * and return a Editor_subscribe_artist with new autoincrement
     * primary key
     *
     * @param  $editor_subscribe_artist
     * @return $editor_subscribe_artist
     *********************************************************
     */
    public function insert2($editor_subscribe_artist)
    {
        $query="INSERT INTO editor_subscribe_artist ( ".
	              "id,".
                      "editor,".
                      "artist,".
                      "last_edit_sent ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_artist->editor." ,".
                      " ".$editor_subscribe_artist->artist." ,".
                      " ".$editor_subscribe_artist->last_edit_sent."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $editor_subscribe_artist->id = $id;
	    return($editor_subscribe_artist);	
    }


    /*********************************************************
     * Update a Editor_subscribe_artist in musicbrainz database
     *
     * @param $editor_subscribe_artist
     * @return n/a
     *********************************************************
     */
    public function update($editor_subscribe_artist)
    {
        $query="UPDATE  editor_subscribe_artist ".
	          "SET ".
                      "id= ".$editor_subscribe_artist->id." ,".
                      "editor= ".$editor_subscribe_artist->editor." ,".
                      "artist= ".$editor_subscribe_artist->artist." ,".
                      "last_edit_sent= ".$editor_subscribe_artist->last_edit_sent."  ".                      
	          "WHERE id=".$editor_subscribe_artist->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Editor_subscribe_artist by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM editor_subscribe_artist WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>