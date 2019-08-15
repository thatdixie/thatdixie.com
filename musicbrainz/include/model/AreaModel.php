<?php
require_once "MusicbrainzDB.php";
require      "Area.php";

/********************************************************************
 * AreaModel inherits MusicbrainzDB and provides functions to
 * map Area class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class AreaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Area by id
     *
     * @return area
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "type,".
                      "edits_pending,".
                      "last_updated,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "ended,".
                      "comment ".                      		               
	       "FROM area ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Area"));
    }

    /*********************************************************
     * Insert a new Area into musicbrainz database
     *
     * @param $area
     * @return n/a
     *********************************************************
     */
    public function insert($area)
    {
        $query="INSERT INTO area ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "type,".
                      "edits_pending,".
                      "last_updated,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "ended,".
                      "comment ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($area->gid)."',".
                      "'".$this->sqlSafe($area->name)."',".
                      " ".$area->type." ,".
                      " ".$area->edits_pending." ,".
                      "'".$this->sqlSafe($area->last_updated)."',".
                      " ".$area->begin_date_year." ,".
                      " ".$area->begin_date_month." ,".
                      " ".$area->begin_date_day." ,".
                      " ".$area->end_date_year." ,".
                      " ".$area->end_date_month." ,".
                      " ".$area->end_date_day." ,".
                      "'".$this->sqlSafe($area->ended)."',".
                      "'".$this->sqlSafe($area->comment)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Area into musicbrainz database
     * and return a Area with new autoincrement
     * primary key
     *
     * @param  $area
     * @return $area
     *********************************************************
     */
    public function insert2($area)
    {
        $query="INSERT INTO area ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "type,".
                      "edits_pending,".
                      "last_updated,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "ended,".
                      "comment ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($area->gid)."',".
                      "'".$this->sqlSafe($area->name)."',".
                      " ".$area->type." ,".
                      " ".$area->edits_pending." ,".
                      "'".$this->sqlSafe($area->last_updated)."',".
                      " ".$area->begin_date_year." ,".
                      " ".$area->begin_date_month." ,".
                      " ".$area->begin_date_day." ,".
                      " ".$area->end_date_year." ,".
                      " ".$area->end_date_month." ,".
                      " ".$area->end_date_day." ,".
                      "'".$this->sqlSafe($area->ended)."',".
                      "'".$this->sqlSafe($area->comment)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $area->id = $id;
	    return($area);	
    }


    /*********************************************************
     * Update a Area in musicbrainz database
     *
     * @param $area
     * @return n/a
     *********************************************************
     */
    public function update($area)
    {
        $query="UPDATE  area ".
	          "SET ".
                      "id= ".$area->id." ,".
                      "gid='".$this->sqlSafe($area->gid)."',".
                      "name='".$this->sqlSafe($area->name)."',".
                      "type= ".$area->type." ,".
                      "edits_pending= ".$area->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($area->last_updated)."',".
                      "begin_date_year= ".$area->begin_date_year." ,".
                      "begin_date_month= ".$area->begin_date_month." ,".
                      "begin_date_day= ".$area->begin_date_day." ,".
                      "end_date_year= ".$area->end_date_year." ,".
                      "end_date_month= ".$area->end_date_month." ,".
                      "end_date_day= ".$area->end_date_day." ,".
                      "ended='".$this->sqlSafe($area->ended)."',".
                      "comment='".$this->sqlSafe($area->comment)."' ".                      
	          "WHERE id=".$area->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Area by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM area WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>