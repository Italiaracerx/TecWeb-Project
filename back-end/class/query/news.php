<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/../utility/regex.php';

class news extends connection implements query{
    private $type;
    private $date;
    private $news;
    private $regex;


    //metodi
    public function __construct($tipo, $date=NULL, $evento =NULL){
        $this->type =parent::escaped_string($tipo);
        $this->date =parent::escaped_string($date);
        $this->news =parent::escaped_string($evento);

        $this->regex=regex::date();
    }
    public function write(){
        preg_match($this->regex, $this->date, $matches, PREG_OFFSET_CAPTURE);
        if(empty($matches)){new exeption('error','Orario non in formato GG-MM-AAAA.');}

        $date_array = explode("-",$this->date); // split the array
        $var_day = $date_array[0]; //day seqment
        $var_month = $date_array[1]; //month segment
        $var_year = $date_array[2]; //year segment
        $new_date_format = $var_year.'-'.$var_month.'-'.$var_day; // join them together

        $query = "INSERT INTO eventi VALUES (NULL,'$this->type','$new_date_format','$this->news')";
        if(!parent::execute_query($query)){
            throw new exeption("error","Non è stato possibile inserire la novita. Riprovare più tardi.");
        }
    }
    public function read($type=NULL){
        $this->delete();
	    if($type != NULL){$this->type=$type;}
        $query = "SELECT * FROM eventi WHERE type = '$this->type' ORDER BY ID DESC LIMIT 10";
        return parent::execute_query($query);
    }

    public function delete(){
        $query="DELETE FROM eventi WHERE ID = '$this->type'";
        if(!parent::execute_query($query)){
            throw new exeption('error', 'evento con id '.$this->id.' non eliminato. Riprovare più tardi.');
        }
    }

    public function delete_periodic(){
        $current_date= date ("Y-m-d");
        $query = "DELETE FROM eventi WHERE data <= '$current_date'";
        parent::execute_query($query);
    }

}

?>
