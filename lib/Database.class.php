<?
class Database
{

    //number of rows affected by SQL query
	private static $instances = array();
	
    public $affected_rows = 0;
    public $link_id = 0;
    public $query_id = 0;
    public $connection = null;
    public $mysqli = null;

    public $db_host = null;
    public $db_user = null;
    public $db_pass = null;
    public $db_name = null;
    public $db_port = null;
	
    public function __construct($db_host = false, $db_user = false,
	    $db_pass = false, $db_name  = false, $db_port = false)
    {

	if($this->db_host == null && $this->db_user == null && $this->db_pass == null && $this->db_name == null && $this->db_port == null)
	{

	    $this->db_host = ($db_host === false)?DBHOST:$db_host;
	    $this->db_user = ($db_user === false)?DBUSER:$db_user;
	    $this->db_pass = ($db_pass === false)?DBPASSWORD:$db_pass;
	    $this->db_name = ($db_name === false)?DBNAME:$db_name;
	    $this->db_port = ($db_port === false)?DBPORT:$db_port;

	}
	
	$this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name, $this->db_port);

	/*try {
			$this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name, $this->db_port);
		} catch(MysqliFault $e) {
			print_r($e);
			die();
		}*/
	$this->mysqli->set_charset("utf8");

    }

	public static function singleton($db_host = false, $db_user = false,
		$db_pass = false, $db_name  = false, $db_port = false){
		foreach	(self::$instances as $instance){
			if($instance['dbhost'] == $db_host && $instance['dbname'] == $db_name){
				return $instance['instance'];
			}
		}
		
		$c = __CLASS__;
		$instance = new $c($db_host, $db_user,$db_pass, $db_name);
		self::$instances[] = array (
							'instance' => $instance,
							'dbhost' => $db_host,
							'dbname' => $db_name,
							'dbport' => $db_port
							);

        return $instance;
    } 	
	
	
    public function insert($table, $data,$pre_fix=TABLE_PREFIX)
    {
	$q="INSERT IGNORE INTO ".((strpos($table, '.') === false)?$pre_fix:'')."".$table." ";
	$v='';
	$n='';

	foreach($data as $key=>$val)
	{
	    $n.="`$key`, ";
	    if(strtolower($val)=='null') $v.="NULL, ";
	    elseif(strtolower($val)=='now()') $v.="NOW(), ";
	    else $v.= "".$this->quotes($val).", ";
	}

	$q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";
	$this->query($q);
	return $this->mysqli->insert_id;

    }

    function update($table, $data, $where='')
    {

	$q="UPDATE ".TABLE_PREFIX."".$table." SET ";

	foreach($data as $key=>$val)
	{
	    if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
	    elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";
	    else $q.= "`$key`=".$this->quotes($val).", ";
	}

	$q = rtrim($q, ', ') . ' WHERE '.$where.';';
	//echo $q;
	return $this->query($q);
    }

    public function quotes($value)
    {
	return "'".$this->mysqli->real_escape_string($value)."'";
    }

    function query($query_string)
    {
#$start = array_sum(explode(' ', microtime()));
		$this->query_id = @$this->mysqli->query($query_string);
#$stop = array_sum(explode(' ', microtime()));
#$totalTime = $stop - $start;
#echo 'Total time for request: ' . $totalTime . "\n";
		//if screwed up
		if (!$this->query_id)
		{
			$debug_backtrace = debug_backtrace();

			$line = $debug_backtrace[0]['line'];
			$file = $debug_backtrace[0]['file'];

						//display error messages only for allowed ips (Sorin P. 12 oct 2009)
			 if (@$_SERVER["REMOTE_ADDR"]=='109.68.198.43'){	
				 
						die('ok<b>MySQL Query fail:</b> line <b>'.$line.'</b> file <b>'.$file.'</b><pre>'.$query_string.'  '.$this->mysqli->error.'</pre>');
				}

			return false;
		}

		$this->affected_rows = @$this->mysqli->affected_rows;

		return $this->query_id;

    }

    public function fetchToArray($result)
    {

	$result_array = array();
	while($row = $this->fetchToRow($result) )
	{
	    $result_array[] = $row;
	}
	return $result_array;

    }
    
    public function fetchToRow($result)
    {
	$row = ($result)?$result->fetch_assoc():false;
	return (!is_null($row) && $result)?$row:false;
    }

    public function prepareArray($form_vars, $required_fields)
    {

	foreach($form_vars as $k => $v)
	{
	    if(!in_array($k, $required_fields))
	    {
		unset($form_vars[$k]);
	    }
	}

	return $form_vars;

    }

    public function num_rows($result)
    {
	return $result->num_rows;
    }

    public function __destruct()
    {
	//mysql_close($this->connection);
			$this->mysqli->close();
    }
	public function fetchToAssoc($result){
		$result_array = array();
		while ($row = $result->fetch_assoc()){
			$result_array[] = $row;
		}
		return $result_array;
	}
	

}
?>
