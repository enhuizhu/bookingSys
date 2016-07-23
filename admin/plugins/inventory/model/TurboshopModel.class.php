<?php
class TurboshopModel extends Model {

    public $validate;
    public $errors = array();
    public $success;
	public $error;

    function __construct() {
	parent::Model();
    }
	/**
	* This is sample method for pluggin
	*/

	public function manage_Turboshop(){
		//insert your code.
	}

	public function add_Turboshop(){
		//insert your code.
	}
	
	public function del_cat($id){
	  //delete category
	  $sql="delete from cms_turboshop_cat where id=$id";
	  if($this->db->query($sql)){
	   $this->success="category has been delete successfully!<br>";
	   $sql="delete from cms_turboshop_product where cat_id=$id";
	   if($this->db->query($sql)){
	    $this->success.="products has been delete successfully!<br>";
		return true;
		}else{
		$this->errors[]=mysql_error();
		return false;
		}
		
	  }else{
	    $this->errors[]=mysql_error();
		return false;
	  }
	  
	}
	
	public function addcat($var){
      if($this->isvalidcat($var["cat_name"]) || true){
	    if(!empty($_FILES["cat_image"]["name"])){
		    if(!$this->upload("cat_image")){
			  $this->errors[]="file upload faild. the error number is: ".$_FILES["cat_image"]["error"];
			}else{
		      $var["cat_image"]=$_FILES["cat_image"]["name"];
			  }
		 }else{
		      $var["cat_image"]="";
		 }
		   
		 if(count($this->errors)>0){
		   return false;
		  }
          
         $var["cat_image"]=$_FILES["cat_image"]["name"];
         $sql="insert into cms_turboshop_cat (cat_name,parent_cat,cat_image) values('";
		 $sql.=$var["cat_name"]."','";
		 $sql.=$var["parent_cat"]."','";
		 $sql.=$var["cat_image"]."')";
         if($this->db->query($sql)){
           $this->success="new catagory has been created successfully!<br/>";
		   return true;
		   }else{
		   $this->errors[]=mysql_error();
		   return false;
		   }
       	
	  }else{
	    $this->errors[]="the catogory is already exsit, please use another name";
		return false;
	  }
	}
	 
	 
	public function addproduct($var){
	  $upload_img=false;
	  if(!empty($_FILES["file"]["name"])){
	    if(!$this->upload("file")){
	    $this->errors[]="file upload faild. the error number is: ".$_FILES["file"]["error"];
		return false;
		}else{
		 $upload_img=true;
		 }
	  }
	   
	   if($upload_img){
	     $var["image"]=$_FILES["file"]["name"];
       }else{
         $var["image"]="";
	   }	   
	   
	   if($var["price"]==""){
	       $var["price"]=0;
		 }
	   
	   $sql="insert into cms_turboshop_product (cat_id,brand,name,info,price,image,cost_price) values (";
	   $sql.=$var["Category"].",'".$var["brand"]."','".$var["nam"]."','".$var["info"]."',".$var["price"];
	   $sql.=",'".$var["image"]."',";
	   $sql.=",".$var["cost_price"].")";
	       if($this->db->query($sql)){
           $this->success="new product has been added successfully!<br/>";
		   return true;
		   }else{
		   $this->errors[]=mysql_error();
		   return false;
		   }
	  
	  
	 }
	
	public function isvalidcat($cat){
	 $sql="select count(*) as cnt from cms_turboshop_cat where cat_name='$cat'";
	 $result=$this->db->query($sql);
	 $row=$this->db->fetchToRow($result);
	 return $row["cnt"]>0?false:true;
	}
	
	public function upload($type){
	  if($type=="cat_image"){
	   $path=CAT_PATH;
	   }else{
	   $path=PRO_PATH;
	   }
	  if(move_uploaded_file($_FILES[$type]["tmp_name"],$path.$_FILES[$type]["name"])){
	    return true;
	  }else{
	    return false;
	  }
    }
	
	public function list_cat(){
	   $sql="select * from cms_turboshop_cat";
	   $result=$this->db->query($sql);
	   $rows=$this->db->fetchToAssoc($result);
	   return $rows;
	}
	
	public function getproducts($cat){
	 $pro=array();
	 if($cat=="all"){
	    $sql="select a.*,b.cat_name from cms_turboshop_product as a left join cms_turboshop_cat as b on a.cat_id=b.id";
	    $result=$this->db->query($sql);
	    $rows=$this->db->fetchToAssoc($result);
	    return $rows; 
	  }else if(!$this->has_child($cat)){
	    // echo "here";
	     $sql="select a.*,b.cat_name from cms_turboshop_product as a left join cms_turboshop_cat as b on a.cat_id=b.id where a.cat_id=$cat";
		 $result=$this->db->query($sql);
	     $rows=$this->db->fetchToAssoc($result);
	     //print_r($rows);
		 return $rows; 
	  }else{
	      $cat_name=$this->get_name_by_id($cat);
	      $children=$this->get_children($cat_name);
		  //var_dump($children);
		  foreach($children as $child){
		   //echo $child["id"]."<br>";
		   $pro=array_merge($pro,$this->getproducts($child["id"]));
		   //var_dump($pro);
		  }
		  return $pro;
	   }
	 
	}
	
	
	public function get_name_by_id($cat_id){
	   $sql="select * from cms_turboshop_cat where id=$cat_id";
	   $result=$this->db->query($sql);
	   $result=$this->db->fetchToRow($result);
	   return $result["id"];
	}
	
	public function has_child($cat){
	  $cat_name=$this->get_name_by_id($cat);
	  $sql="select count(*) as cn from cms_turboshop_cat where parent_cat='$cat_name'";
	  $result=$this->db->query($sql);
	  $result=$this->db->fetchToRow($result);
	  return $result["cn"]>0?true:false;
	}
	
	public function get_children($cat){
	   $sql="select * from cms_turboshop_cat where parent_cat='$cat'";
	   $result=$this->db->query($sql);
	   $result=$this->db->fetchToAssoc($result);
	   return $result;
	}
	
	public function toogle_vis($id){
	 //get original value
	 $sql="select is_visible from cms_turboshop_product where id=$id";
	 $result=$this->db->query($sql);
	 $row=$this->db->fetchToRow($result);
	 $new_vis=$row["is_visible"]==0?1:0;
	 //update the state
	 $sql="update cms_turboshop_product set is_visible=$new_vis where id=$id";
	 if($this->db->query($sql)){
	    echo $new_vis;
	   }else{
	    echo mysql_error();
	   }
	 }
	
	public function pro_info($id){
	 $sql="select * from cms_turboshop_product where id=$id";
	 $result=$this->db->query($sql);
	 $row=$this->db->fetchToRow($result);
	 return $row;
	}
  
   public function cat_info($id){
	 $sql="select * from cms_turboshop_cat where id=$id";
	 $result=$this->db->query($sql);
	 $row=$this->db->fetchToRow($result);
	 return $row;
	}
	
	public function updateProduct($var,$id){
	
	if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])){  
	  if(!$this->upload("file")){
	    $this->errors[]="file upload faild. the error number is: ".$_FILES["file"]["error"];
	  }else{
	   $var["image"]=$_FILES["file"]["name"];
	   $sql="update cms_turboshop_product set cat_id=".$var["Category"].", brand=".$this->db->quotes($var["brand"]);
	   $sql.=",name=".$this->db->quotes($var["nam"]);
	   $sql.=",info=".$this->db->quotes($var["info"]);
	   $sql.=",price=".$var["price"];
	   $sql.=",image=".$this->db->quotes($var["image"]);
	   $sql.=",cost_price=".$this->db->quotes($var["cost_price"]);
	   $sql.=" where id=$id";
	 }
	}else{
	   $sql="update cms_turboshop_product set cat_id=".$var["Category"].", brand=".$this->db->quotes($var["brand"]);
	   $sql.=",name=".$this->db->quotes($var["nam"]);
	   $sql.=",info=".$this->db->quotes($var["info"]);
	   $sql.=",price=".$var["price"];
	   $sql.=",cost_price=".$var["cost_price"];
	   $sql.=" where id=$id";
	}
	//echo $sql;
	if($this->db->query($sql)){
           $this->success="new product has been updated successfully!<br/>";
		   return true;
		   }else{
		   $this->errors[]=mysql_error();
		   return false;
		   }
	}
	
	
	public function updateCat($var,$id){
	 //get the original cat name
      $cat_info=$this->get_cat_info($id);
	  //cat_name chage
	  if($cat_info["cat_name"]!=$var["cat_name"]){
	   if(!$this->isvalidcat($var["cat_name"])){
		  $this->errors[]="this catogory already exsit!";
		  return false;
		 }
	  }
	  
	  //parent category change
	  
	  if($cat_info["parent_cat"]!=$var["parent_cat"]){
	    //parents become itself
	      if($var["cat_name"]==$var["parent_cat"]){
		      $this->errors[]="the category itself can not become parent category";
		     return false;
		 }
	  }
	  
      if(isset($_FILES["cat_image"]["name"]) && !empty($_FILES["cat_image"]["name"])){  
	  if(!$this->upload("cat_image")){
	    $this->errors[]="file upload faild. the error number is: ".$_FILES["file"]["error"];
	  }else{
	   $var["image"]=$_FILES["cat_image"]["name"];
	   $sql="update cms_turboshop_cat set parent_cat=".$this->db->quotes($var["parent_cat"]);
	   $sql.=",cat_image=".$this->db->quotes($var["image"]);
	   $sql.=",cat_name=".$this->db->quotes($var["cat_name"]);
       $sql.=" where id=$id";
	 }
	}else{
	   $sql="update cms_turboshop_cat set parent_cat=".$this->db->quotes($var["parent_cat"]);
       $sql.=",cat_name=".$this->db->quotes($var["cat_name"]);
       $sql.=" where id=$id";
	}
	//echo $sql;
	if($this->db->query($sql)){
           $this->success="new catogory has been updated successfully!<br/>";
		   //update product catogory na	
           return true;		   
		   }else{
		   $this->errors[]=mysql_error();
		   return false;
		   }
	}
	
	public function delpro($id){
	 $sql="delete from cms_turboshop_product where id=$id";
	 if(!$this->db->query($sql)){
	   $this->errors[]=mysql_error();
	   return false;
	   }else{
	   $this->success="product has been deleted successfully!";
	  return true;
	  }
	 }
	 
	 //get cat name
	 public function get_cat_info($id){
	  $sql="select * from cms_turboshop_cat where id=$id";
	  $result=$this->db->query($sql);
	  $row=$this->db->fetchAssoc($result);
	  if(!empty($row)) return $row;
      else{
	     $this->errors[]="this category not exsit";
	      return false;
          }	  
	 }
	public function cofig(){
	  return CAT_PATH;
	}
	
	/*
	** get all the branchs
	*/
    public function get_all_branches(){
	  $sql="select * from cms_branch";
	  $result=$this->db->query($sql);
	  $result=$this->db->fetchToAssoc($result);
	  return $result;
	}
	/*
	** get all the products
	*/
	public function get_all_products($bran_id){
	   /*get all the seted item from invetory table*/
	   $sql="select * from cms_inventory where branch_id=".$this->db->quotes($bran_id);
	   $result=$this->db->query($sql);
	   $bran_result=$this->db->fetchToAssoc($result);
	   
	   $new_bran_result=array();
	   /*change the branc result maket it with item key*/
	   foreach($bran_result as $bran){
	     $new_bran_result[$bran["item_id"]]=$bran;
	   }
	   //var_dump($new_bran_result);
	   //echo "<br>";
	   $sql="select *, a.id as 'aid' from cms_turboshop_product as a left join cms_turboshop_cat b on a.cat_id=b.id";
	   $result=$this->db->query($sql);
	   $products=$this->db->fetchToArray($result);
       //echo "products is :";
	  // var_dump($products);
	   //echo "<br>";
	   /*combine bran result and products*/
	   $new_products = array();
	   foreach($products as $product){
	      if(isset($new_bran_result[$product["aid"]])){
             foreach($new_bran_result[$product["aid"]] as $k=>$v){
			     if($k!="id"){
				  $product[$k]=$v;
				 }
			 }
		  }
          array_push($new_products,$product);		  
	   }
	   
	   return $new_products;
	}
	
	/*
	**get branch by id
	*/
	
	public function get_bran_by_id($id){
	  $sql="select * from cms_branch where bran_id=".$this->db->quotes($id);
	  $result=$this->db->query($sql);
	  $result=$this->db->fetchToRow($result);
	  return $result;
	}
	
	/**
	*  update invetory item
	**/
   
   public function update_inventory_itme($item_id,$branch_id,$quntity){
      /*check if the rocord exsit*/
	  //die("$item_id,$branch_id,$quntity");
	  $row=$this->get_inventory_record($item_id,$branch_id);
	  if(empty($row)){
	   return $this->insert_item_to_inventory($item_id,$branch_id,$quntity);
	  }else{
	   $sql="update cms_inventory set quntity=".$this->db->quotes($quntity);
	   $sql.=" where item_id=".$this->db->quotes($item_id);
	   $sql.=" and branch_id=".$this->db->quotes($branch_id);
	   if($this->db->query($sql)){
	      return true;
	   }else{
	     $this->error=mysqli_error($this->db->mysqli);
		 return false;
	   }
	  }
   
   }
   
  public function get_inventory_record($item_id,$branch_id){
     $sql="select * from cms_inventory";
	 $sql.=" where item_id=".$this->db->quotes($item_id);
	 $sql.=" and branch_id=".$this->db->quotes($branch_id);
	 $result=$this->db->query($sql);
	 $result=$this->db->fetchToRow($result);
	 return $result;
  }
  
  public function insert_item_to_inventory($item_id,$branch_id,$quntity){
      $sql="insert into cms_inventory (quntity,item_id,branch_id) values (".$this->db->quotes($quntity).",";
	  $sql.=$this->db->quotes($item_id).",";
	  $sql.=$this->db->quotes($branch_id).")";
	  if($this->db->query($sql)){
	     return true;
	  }else{
	     $this->error=mysqli_error($this->db->mysqli);
		 return false;
	  }
  }
  
  public function update_inventory_order($item_id,$branch_id,$quntity,$total_price,$order_date){
      $sql="insert into cms_inventory_order (item_id,branch_id, 	quntity,total_price,order_date) values(";
	  $sql.=$this->db->quotes($item_id).",";
	  $sql.=$this->db->quotes($branch_id).",";
	  $sql.=$this->db->quotes($quntity).",";
	  $sql.=$this->db->quotes($total_price).",";
	  $sql.=$this->db->quotes($order_date).")";
	  if($this->db->query($sql)){
	       $sql="update cms_inventory set quntity=quntity+".$this->db->quotes($quntity);
	       $sql.=" where item_id=".$this->db->quotes($item_id);
	       $sql.=" and branch_id=".$this->db->quotes($branch_id);
		   $this->db->query($sql);
		   return true;
	  }else{
	     $this->error=mysqli_error($this->db->mysqli);
		 return false;
	  }
  }
  
  public function get_all_order($bran_id){
     $sql="select * from cms_inventory_order as a left join cms_turboshop_product as b on a.item_id=b.id left join cms_turboshop_cat as c on b.cat_id=c.id";
	 $sql.=" where a.branch_id=".$this->db->quotes($bran_id);
	 $result=$this->db->query($sql);
	 $result=$this->db->fetchToArray($result);
	 return $result;
  
  }
  
  public function testxsl(){
     echo "this is test";
	 $xlsx = new SimpleXLSX('/home/hjteng5/public_html/Ginsen/admin/plugins/inventory/model/test.xlsx');
	 if(!$xlsx->rows()){
	    die($xlsx->error());
	 }
	 $result=$xlsx->rows();
	 $sql="insert into cms_turboshop_product (cat_id,name) values ";
	 foreach($result as $re){
	    if(isset($re[1]) && !empty($re[1]) && isset($re[2]) && !empty($re[2])){
		  if(!$this->medicine_exsist($re[1])){
		   $sql.="(26,".$this->db->quotes($re[1])."),";
		  }
		}
	 }
	 $sql=rtrim($sql,",");
	 $sql=$sql.";";
	 echo $sql;
	 $this->db->query($sql);
	}
	
  public function medicine_exsist($name){
    $sql="select * from cms_turboshop_product where name=".$this->db->quotes($name);
	$result=$this->db->query($sql);
	$result=$this->db->fetchToArray($result);
	if(!empty($result)){
	   return true;
	}else{
	   return false;
	}
  }  
 }
?>