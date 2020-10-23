<?php

class PickupDays{
    private $conn;
    #private $table_name="pickup_zones";

    public $product_name;
    #public $zoneid;
    public function __construct($db){
        $this->conn = $db;
    }
    public function getzoneid(){
       /* $days=array();
        $query="select * from pickup_zones where zip_code=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->zipcode]); 
        $res = $stmt->fetch();
        $zoneid = $res["zone_id"];
        $query1="SELECT * FROM pickup_dates where zone_id=?";
        $stmt1 = $this->conn->prepare($query1);
        //passed as parameter to query
        $stmt1->execute([$zoneid]); 
        $res1 = $stmt1->fetch();
        $days["trash_pickup"] = $res1["trash_pickup"];
        $days["recycle_pickup"] = $res1["recycle_pickup"];
        $days["compost_pickup"] = $res1["compost_pickup"];
        return $res;
        */
        /*echo "inside getzoneid";
        echo "value of the item name is ".$this->product_name;
        $res= array();
        $query =
        "select steps from trueerecycle.recycle_steps where 
        recycle_id= 
        (select category_id from trueerecycle.product_library where product_name=?)";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($this->product_name));
        $result= array();
        $result = $stmt->fetch();*/

        /*if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row['steps'];
            }
           } else {
            echo "0 results";
           }
           */

        echo "value of the item name is ".$this->product_name;
        $query="select category_id from trueerecycle.product_library where product_name=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->product_name]); 
        $res = $stmt->fetch();
        /*foreach($res as $i)
        {
            echo $i ."<br>";
        }*/
        #echo "res[0] is ".$res[0];
        #echo $res;
        $query= "select steps from trueerecycle.recycle_steps where 
        recycle_id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array(intval($res[0]))); 
        $res = $stmt->fetch();
        foreach($res as $i)
        {
         #   echo $i ."<br>";
        }
        #echo "result value is".$res[0];
        #$steps= $res['steps'];
        #echo "steps are".$res[0];
        $res['steps']= $res[0];
        $res['item']=$this->product_name;
        return $res;
    }

}

?>