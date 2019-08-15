<?php
require_once "MusicbrainzDB.php";
require      "Label.php";

/********************************************************************
 * LabelModel inherits MusicbrainzDB and provides functions to
 * map Label class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class LabelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Label by id
     *
     * @return label
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "label_code,".
                      "type,".
                      "area,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "ended ".                      		               
	       "FROM label ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Label"));
    }

    /*********************************************************
     * Insert a new Label into musicbrainz database
     *
     * @param $label
     * @return n/a
     *********************************************************
     */
    public function insert($label)
    {
        $query="INSERT INTO label ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "label_code,".
                      "type,".
                      "area,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($label->gid)."',".
                      "'".$this->sqlSafe($label->name)."',".
                      " ".$label->begin_date_year." ,".
                      " ".$label->begin_date_month." ,".
                      " ".$label->begin_date_day." ,".
                      " ".$label->end_date_year." ,".
                      " ".$label->end_date_month." ,".
                      " ".$label->end_date_day." ,".
                      " ".$label->label_code." ,".
                      " ".$label->type." ,".
                      " ".$label->area." ,".
                      "'".$this->sqlSafe($label->comment)."',".
                      " ".$label->edits_pending." ,".
                      "'".$this->sqlSafe($label->last_updated)."',".
                      "'".$this->sqlSafe($label->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Label into musicbrainz database
     * and return a Label with new autoincrement
     * primary key
     *
     * @param  $label
     * @return $label
     *********************************************************
     */
    public function insert2($label)
    {
        $query="INSERT INTO label ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "label_code,".
                      "type,".
                      "area,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($label->gid)."',".
                      "'".$this->sqlSafe($label->name)."',".
                      " ".$label->begin_date_year." ,".
                      " ".$label->begin_date_month." ,".
                      " ".$label->begin_date_day." ,".
                      " ".$label->end_date_year." ,".
                      " ".$label->end_date_month." ,".
                      " ".$label->end_date_day." ,".
                      " ".$label->label_code." ,".
                      " ".$label->type." ,".
                      " ".$label->area." ,".
                      "'".$this->sqlSafe($label->comment)."',".
                      " ".$label->edits_pending." ,".
                      "'".$this->sqlSafe($label->last_updated)."',".
                      "'".$this->sqlSafe($label->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $label->id = $id;
	    return($label);	
    }


    /*********************************************************
     * Update a Label in musicbrainz database
     *
     * @param $label
     * @return n/a
     *********************************************************
     */
    public function update($label)
    {
        $query="UPDATE  label ".
	          "SET ".
                      "id= ".$label->id." ,".
                      "gid='".$this->sqlSafe($label->gid)."',".
                      "name='".$this->sqlSafe($label->name)."',".
                      "begin_date_year= ".$label->begin_date_year." ,".
                      "begin_date_month= ".$label->begin_date_month." ,".
                      "begin_date_day= ".$label->begin_date_day." ,".
                      "end_date_year= ".$label->end_date_year." ,".
                      "end_date_month= ".$label->end_date_month." ,".
                      "end_date_day= ".$label->end_date_day." ,".
                      "label_code= ".$label->label_code." ,".
                      "type= ".$label->type." ,".
                      "area= ".$label->area." ,".
                      "comment='".$this->sqlSafe($label->comment)."',".
                      "edits_pending= ".$label->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($label->last_updated)."',".
                      "ended='".$this->sqlSafe($label->ended)."' ".                      
	          "WHERE id=".$label->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Label by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM label WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>