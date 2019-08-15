<?php
require_once "MusicbrainzDB.php";
require      "Editor_subscribe_collection.php";

/********************************************************************
 * Editor_subscribe_collectionModel inherits MusicbrainzDB and provides functions to
 * map Editor_subscribe_collection class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_subscribe_collectionModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Editor_subscribe_collection by id
     *
     * @return editor_subscribe_collection
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "collection,".
                      "last_edit_sent,".
                      "available,".
                      "last_seen_name ".                      		               
	       "FROM editor_subscribe_collection ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Editor_subscribe_collection"));
    }

    /*********************************************************
     * Insert a new Editor_subscribe_collection into musicbrainz database
     *
     * @param $editor_subscribe_collection
     * @return n/a
     *********************************************************
     */
    public function insert($editor_subscribe_collection)
    {
        $query="INSERT INTO editor_subscribe_collection ( ".
	              "id,".
                      "editor,".
                      "collection,".
                      "last_edit_sent,".
                      "available,".
                      "last_seen_name ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_collection->editor." ,".
                      " ".$editor_subscribe_collection->collection." ,".
                      " ".$editor_subscribe_collection->last_edit_sent." ,".
                      "'".$this->sqlSafe($editor_subscribe_collection->available)."',".
                      "'".$this->sqlSafe($editor_subscribe_collection->last_seen_name)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Editor_subscribe_collection into musicbrainz database
     * and return a Editor_subscribe_collection with new autoincrement
     * primary key
     *
     * @param  $editor_subscribe_collection
     * @return $editor_subscribe_collection
     *********************************************************
     */
    public function insert2($editor_subscribe_collection)
    {
        $query="INSERT INTO editor_subscribe_collection ( ".
	              "id,".
                      "editor,".
                      "collection,".
                      "last_edit_sent,".
                      "available,".
                      "last_seen_name ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_collection->editor." ,".
                      " ".$editor_subscribe_collection->collection." ,".
                      " ".$editor_subscribe_collection->last_edit_sent." ,".
                      "'".$this->sqlSafe($editor_subscribe_collection->available)."',".
                      "'".$this->sqlSafe($editor_subscribe_collection->last_seen_name)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $editor_subscribe_collection->id = $id;
	    return($editor_subscribe_collection);	
    }


    /*********************************************************
     * Update a Editor_subscribe_collection in musicbrainz database
     *
     * @param $editor_subscribe_collection
     * @return n/a
     *********************************************************
     */
    public function update($editor_subscribe_collection)
    {
        $query="UPDATE  editor_subscribe_collection ".
	          "SET ".
                      "id= ".$editor_subscribe_collection->id." ,".
                      "editor= ".$editor_subscribe_collection->editor." ,".
                      "collection= ".$editor_subscribe_collection->collection." ,".
                      "last_edit_sent= ".$editor_subscribe_collection->last_edit_sent." ,".
                      "available='".$this->sqlSafe($editor_subscribe_collection->available)."',".
                      "last_seen_name='".$this->sqlSafe($editor_subscribe_collection->last_seen_name)."' ".                      
	          "WHERE id=".$editor_subscribe_collection->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Editor_subscribe_collection by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM editor_subscribe_collection WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>