<?php
require_once "MusicbrainzDB.php";
require      "Annotation.php";

/********************************************************************
 * AnnotationModel inherits MusicbrainzDB and provides functions to
 * map Annotation class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class AnnotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Annotation by id
     *
     * @return annotation
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "text,".
                      "changelog,".
                      "created ".                      		               
	       "FROM annotation ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Annotation"));
    }

    /*********************************************************
     * Insert a new Annotation into musicbrainz database
     *
     * @param $annotation
     * @return n/a
     *********************************************************
     */
    public function insert($annotation)
    {
        $query="INSERT INTO annotation ( ".
	              "id,".
                      "editor,".
                      "text,".
                      "changelog,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$annotation->editor." ,".
                      "'".$this->sqlSafe($annotation->text)."',".
                      "'".$this->sqlSafe($annotation->changelog)."',".
                      "'".$this->sqlSafe($annotation->created)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Annotation into musicbrainz database
     * and return a Annotation with new autoincrement
     * primary key
     *
     * @param  $annotation
     * @return $annotation
     *********************************************************
     */
    public function insert2($annotation)
    {
        $query="INSERT INTO annotation ( ".
	              "id,".
                      "editor,".
                      "text,".
                      "changelog,".
                      "created ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$annotation->editor." ,".
                      "'".$this->sqlSafe($annotation->text)."',".
                      "'".$this->sqlSafe($annotation->changelog)."',".
                      "'".$this->sqlSafe($annotation->created)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $annotation->id = $id;
	    return($annotation);	
    }


    /*********************************************************
     * Update a Annotation in musicbrainz database
     *
     * @param $annotation
     * @return n/a
     *********************************************************
     */
    public function update($annotation)
    {
        $query="UPDATE  annotation ".
	          "SET ".
                      "id= ".$annotation->id." ,".
                      "editor= ".$annotation->editor." ,".
                      "text='".$this->sqlSafe($annotation->text)."',".
                      "changelog='".$this->sqlSafe($annotation->changelog)."',".
                      "created='".$this->sqlSafe($annotation->created)."' ".                      
	          "WHERE id=".$annotation->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Annotation by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM annotation WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>