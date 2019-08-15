<?php
require_once "MusicbrainzDB.php";
require      "Editor_subscribe_series.php";

/********************************************************************
 * Editor_subscribe_seriesModel inherits MusicbrainzDB and provides functions to
 * map Editor_subscribe_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_subscribe_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Editor_subscribe_series by id
     *
     * @return editor_subscribe_series
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "series,".
                      "last_edit_sent ".                      		               
	       "FROM editor_subscribe_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Editor_subscribe_series"));
    }

    /*********************************************************
     * Insert a new Editor_subscribe_series into musicbrainz database
     *
     * @param $editor_subscribe_series
     * @return n/a
     *********************************************************
     */
    public function insert($editor_subscribe_series)
    {
        $query="INSERT INTO editor_subscribe_series ( ".
	              "id,".
                      "editor,".
                      "series,".
                      "last_edit_sent ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_series->editor." ,".
                      " ".$editor_subscribe_series->series." ,".
                      " ".$editor_subscribe_series->last_edit_sent."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Editor_subscribe_series into musicbrainz database
     * and return a Editor_subscribe_series with new autoincrement
     * primary key
     *
     * @param  $editor_subscribe_series
     * @return $editor_subscribe_series
     *********************************************************
     */
    public function insert2($editor_subscribe_series)
    {
        $query="INSERT INTO editor_subscribe_series ( ".
	              "id,".
                      "editor,".
                      "series,".
                      "last_edit_sent ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_series->editor." ,".
                      " ".$editor_subscribe_series->series." ,".
                      " ".$editor_subscribe_series->last_edit_sent."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $editor_subscribe_series->id = $id;
	    return($editor_subscribe_series);	
    }


    /*********************************************************
     * Update a Editor_subscribe_series in musicbrainz database
     *
     * @param $editor_subscribe_series
     * @return n/a
     *********************************************************
     */
    public function update($editor_subscribe_series)
    {
        $query="UPDATE  editor_subscribe_series ".
	          "SET ".
                      "id= ".$editor_subscribe_series->id." ,".
                      "editor= ".$editor_subscribe_series->editor." ,".
                      "series= ".$editor_subscribe_series->series." ,".
                      "last_edit_sent= ".$editor_subscribe_series->last_edit_sent."  ".                      
	          "WHERE id=".$editor_subscribe_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Editor_subscribe_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM editor_subscribe_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>