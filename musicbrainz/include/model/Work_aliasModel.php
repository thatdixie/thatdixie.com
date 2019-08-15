<?php
require_once "MusicbrainzDB.php";
require      "Work_alias.php";

/********************************************************************
 * Work_aliasModel inherits MusicbrainzDB and provides functions to
 * map Work_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Work_alias by id
     *
     * @return work_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "work,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      		               
	       "FROM work_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Work_alias"));
    }

    /*********************************************************
     * Insert a new Work_alias into musicbrainz database
     *
     * @param $work_alias
     * @return n/a
     *********************************************************
     */
    public function insert($work_alias)
    {
        $query="INSERT INTO work_alias ( ".
	              "id,".
                      "work,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$work_alias->work." ,".
                      "'".$this->sqlSafe($work_alias->name)."',".
                      "'".$this->sqlSafe($work_alias->locale)."',".
                      " ".$work_alias->edits_pending." ,".
                      "'".$this->sqlSafe($work_alias->last_updated)."',".
                      " ".$work_alias->type." ,".
                      "'".$this->sqlSafe($work_alias->sort_name)."',".
                      " ".$work_alias->begin_date_year." ,".
                      " ".$work_alias->begin_date_month." ,".
                      " ".$work_alias->begin_date_day." ,".
                      " ".$work_alias->end_date_year." ,".
                      " ".$work_alias->end_date_month." ,".
                      " ".$work_alias->end_date_day." ,".
                      "'".$this->sqlSafe($work_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($work_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Work_alias into musicbrainz database
     * and return a Work_alias with new autoincrement
     * primary key
     *
     * @param  $work_alias
     * @return $work_alias
     *********************************************************
     */
    public function insert2($work_alias)
    {
        $query="INSERT INTO work_alias ( ".
	              "id,".
                      "work,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$work_alias->work." ,".
                      "'".$this->sqlSafe($work_alias->name)."',".
                      "'".$this->sqlSafe($work_alias->locale)."',".
                      " ".$work_alias->edits_pending." ,".
                      "'".$this->sqlSafe($work_alias->last_updated)."',".
                      " ".$work_alias->type." ,".
                      "'".$this->sqlSafe($work_alias->sort_name)."',".
                      " ".$work_alias->begin_date_year." ,".
                      " ".$work_alias->begin_date_month." ,".
                      " ".$work_alias->begin_date_day." ,".
                      " ".$work_alias->end_date_year." ,".
                      " ".$work_alias->end_date_month." ,".
                      " ".$work_alias->end_date_day." ,".
                      "'".$this->sqlSafe($work_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($work_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $work_alias->id = $id;
	    return($work_alias);	
    }


    /*********************************************************
     * Update a Work_alias in musicbrainz database
     *
     * @param $work_alias
     * @return n/a
     *********************************************************
     */
    public function update($work_alias)
    {
        $query="UPDATE  work_alias ".
	          "SET ".
                      "id= ".$work_alias->id." ,".
                      "work= ".$work_alias->work." ,".
                      "name='".$this->sqlSafe($work_alias->name)."',".
                      "locale='".$this->sqlSafe($work_alias->locale)."',".
                      "edits_pending= ".$work_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($work_alias->last_updated)."',".
                      "type= ".$work_alias->type." ,".
                      "sort_name='".$this->sqlSafe($work_alias->sort_name)."',".
                      "begin_date_year= ".$work_alias->begin_date_year." ,".
                      "begin_date_month= ".$work_alias->begin_date_month." ,".
                      "begin_date_day= ".$work_alias->begin_date_day." ,".
                      "end_date_year= ".$work_alias->end_date_year." ,".
                      "end_date_month= ".$work_alias->end_date_month." ,".
                      "end_date_day= ".$work_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($work_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($work_alias->ended)."' ".                      
	          "WHERE id=".$work_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Work_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM work_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>