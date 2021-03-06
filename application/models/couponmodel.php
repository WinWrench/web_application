<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class couponmodel extends CI_Model{
    public function getcategories()
    {
        $result=$this->db->query("select * from category");
        return $result->result();
    }
    public function getallsellers()
    {
        $result=$this->db->query("select * from seller");
        return $result->result();
    }
    public function addcoupontodb()
    {
        $coupon_title=$this->input->post('coupon_title');
        $categoryid=$this->input->post('categoryid');
        $sellerid=$this->input->post('sellerid');
        $couponaddress=$this->input->post('sys_address');
        $couponcity=$this->input->post('sys_couponcity');
        $couponpincode=$this->input->post('sys_pincode');
        $coupon_startdate=date('Y-m-d',  strtotime($this->input->post('coupon_startdate')));
        $coupon_enddate=date('Y-m-d',  strtotime($this->input->post('coupon_enddate')));
        $coupon_cost=$this->input->post('coupon_cost');
        $coupon_description=$this->input->post('coupon_description');
        
        $termsandcondition=$this->input->post('sys_termscondition');
        $couponoffers=$this->input->post('sys_couponoffer');
        $utilizationvalidity=date('Y-m-d',  strtotime($this->input->post('sys_validity')));
        $recommendations=$this->input->post('sys_recommendation');
        
        $assembledaddress = $couponaddress.'+'.$couponcity.'+'.$couponpincode;
            $assembledaddress = preg_replace('/\s+/', '+', $assembledaddress);
          
       $jsondata = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$assembledaddress."&key=AIzaSyDgVYB2iXj2lJdAcQ-27o-8sJZkYlmt5Pk");
         $jsondata = json_decode($jsondata);
            $latitude = "";
            $logitude = "";
           foreach ($jsondata->results as $result){
               $latitude=$result->geometry->location->lat;
                $logitude=$result->geometry->location->lng;
           }    
        $this->db->query("insert into coupons values('','".$sellerid."','".$categoryid."','1','".$coupon_title."','',
             '".$couponaddress."','".$couponcity."','".$couponpincode."','".$latitude."','".$logitude."','".$coupon_startdate."','".$coupon_enddate."','".$coupon_cost."','','','','".$coupon_description."',
                 '".$termsandcondition."','".$couponoffers."','".$utilizationvalidity."','".$recommendations."')");
        $id=$this->db->insert_id();
         $name="image"."_$id";
         $document="";
                if($_FILES['coupon_image']['tmp_name']!=""){
                    $ext =  end(explode('.', $_FILES['coupon_image']['name']));
                    
                    move_uploaded_file($_FILES["coupon_image"]["tmp_name"],
                   "./couponimages/" . $_FILES["coupon_image"]["name"]);
                    rename('./couponimages/'. $_FILES["coupon_image"]["name"], './couponimages/'.$name.".".$ext);
                     $document = $name.".".$ext;
                } 
                $attachmentarray = array();
                  array_push($attachmentarray, $document);
                  $attachmentjsonarray=json_encode($attachmentarray);
                  
             $this->db->query("update coupons set coupon_images='".$attachmentjsonarray."' where id='".$id."'");
        return $id;
    }
    public function getallcoupons()
    {
        $result=$this->db->query("select * from coupons ");
        return $result->result();
    }
    public function geteachcoupon($couponid)
    {
      //  $result=$this->db->query("select * from coupons where id='".$couponid."' ");
        $result=$this->db->query("select COUNT(*) as count,c .* from coupons c,liked_coupons lc where(c.id='".$couponid."'and c.id=lc.id_coupons)");
        return $result->result();
    }
     public function addbuyerlike()
    {
        $buyerid=$this->input->post('buyerid');
        $couponid=$this->input->post('couponid');
        
        $res=$this->db->query("select * from liked_coupons where id_buyer='".$buyerid."' and id_coupons='".$couponid."'");
       
         if($res->num_rows()==0){
      $this->db->query("insert into liked_coupons values('','".$buyerid."','".$couponid."')");
      
      $count= $this->db->query("select * from liked_coupons where id_coupons='".$couponid."'");
      $likecount= $count->num_rows;
              return  $likecount; 
   
      }  else {
          $count= $this->db->query("select * from liked_coupons where id_coupons='".$couponid."'");
      $likecount= $count->num_rows;
                       return  $likecount;
      }
    }
    public function deletelike()
    {
        $buyerid=$this->input->post('buyerid');
        $couponid=$this->input->post('couponid');
        
         $res=$this->db->query("select * from liked_coupons where id_buyer='".$buyerid."' and id_coupons='".$couponid."'");
         
         if($res->num_rows()==0){
             $count= $this->db->query("select * from liked_coupons where id_coupons='".$couponid."'");
      $likecount= $count->num_rows;
                       return  $likecount;
      }  else {
           $this->db->query("delete from liked_coupons where id_buyer='".$buyerid."' and id_coupons='".$couponid."' ");
      
      $count= $this->db->query("select * from liked_coupons where id_coupons='".$couponid."'");
      $likecount= $count->num_rows;
              return  $likecount; 
      }
         
    }
}
?>
 