<?php
require_once "MusicbrainzDB.php";
require      "Label_alias.php";

/********************************************************************
 * Label_aliasModel inherits MusicbrainzDB and provides functions to
 * map Label_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Label_alias by id
     *
     * @return label_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "label,".
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
	       "FROM label_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Label_alias"));
    }

    /*********************************************************
     * Insert a new Label_alias into musicbrainz database
     *
     * @param $label_alias
     * @return n/a
     *********************************************************
     */
    public function insert($label_alias)
    {
        $query="INSERT INTO label_alias ( ".
	              "id,".
                      "label,".
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
                      " ".$label_alias->label." ,".
                      "'".$this->sqlSafe($label_alias->name)."',".
                      "'".$this->sqlSafe($label_alias->locale)."',".
                      " ".$label_alias->edits_pending." ,".
                      "'".$this->sqlSafe($label_alias->last_updated)."',".
                      " ".$label_alias->type." ,".
                      "'".$this->sqlSafe($label_alias->sort_name)."',".
                      " ".$label_alias->begin_date_year." ,".
                      " ".$label_alias->begin_date_month." ,".
                      " ".$label_alias->begin_date_day." ,".
                      " ".$label_alias->end_date_year." ,".
                      " ".$label_alias->end_date_month." ,".
                      " ".$label_alias->end_date_day." ,".
                      "'".$this->sqlSafe($label_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($label_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Label_alias into musicbrainz database
     * and return a Label_alias with new autoincrement
     * primary key
     *
     * @param  $label_alias
     * @return $label_alias
     *********************************************************
     */
    public function insert2($label_alias)
    {
        $query="INSERT INTO label_alias ( ".
	              "id,".
                      "label,".
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
                      " ".$label_alias->label." ,".
                      "'".$this->sqlSafe($label_alias->name)."',".
                      "'".$this->sqlSafe($label_alias->locale)."',".
                      " ".$label_alias->edits_pending." ,".
                      "'".$this->sqlSafe($label_alias->last_updated)."',".
                      " ".$label_alias->type." ,".
                      "'".$this->sqlSafe($label_alias->sort_name)."',".
                      " ".$label_alias->begin_date_year." ,".
                      " ".$label_alias->begin_date_month." ,".
                      " ".$label_alias->begin_date_day." ,".
                      " ".$label_alias->end_date_year." ,".
                      " ".$label_alias->end_date_month." ,".
                      " ".$label_alias->end_date_day." ,".
                      "'".$this->sqlSafe($label_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($label_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $label_alias->id = $id;
	    return($label_alias);	
    }


    /*********************************************************
     * Update a Label_alias in musicbrainz database
     *
     * @param $label_alias
     * @return n/a
     *********************************************************
     */
    public function update($label_alias)
    {
        $query="UPDATE  label_alias ".
	          "SET ".
                      "id= ".$label_alias->id." ,".
                      "label= ".$label_alias->label." ,".
                      "name='".$this->sqlSafe($label_alias->name)."',".
                      "locale='".$this->sqlSafe($label_alias->locale)."',".
                      "edits_pending= ".$label_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($label_alias->last_updated)."',".
                      "type= ".$label_alias->type." ,".
                      "sort_name='".$this->sqlSafe($label_alias->sort_name)."',".
                      "begin_date_year= ".$label_alias->begin_date_year." ,".
                      "begin_date_month= ".$label_alias->begin_date_month." ,".
                      "begin_date_day= ".$label_alias->begin_date_day." ,".
                      "end_date_year= ".$label_alias->end_date_year." ,".
                      "end_date_month= ".$label_alias->end_date_month." ,".
                      "end_date_day= ".$label_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($label_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($label_alias->ended)."' ".                      
	          "WHERE id=".$label_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Label_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM label_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>