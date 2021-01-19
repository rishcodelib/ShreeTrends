<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Model extends CI_Model
{

    public function login($data)
    {
        $this->db->where('Username', $data['username']);
        $this->db->where('password', $data['password']);
        $query = $this->db->get('users');
        $uid = $query->row()->UserID;
        if ($query->num_rows() == 1) {
            $this->db->select('*');
            $this->db->from('merchants');
            $this->db->join('users', 'users.UserID = merchants.UserID');
            $this->db->where('users.UserID', $uid);
            $result = $this->db->get()->row();
            // print_r($query);

            if ($result->is_Authorized != 0) {
                $this->session->set_flashdata('InvalidAccess', "Your Access Has beed Revoked by the Administrator");
                redirect("/");
            } else {
                return $result;
            }
        } else {
            $this->session->set_flashdata("Failed", "Invalid Credentials");
            redirect("/");
        }
    }

    public function signup($merchant, $user)
    {
        $this->db->insert('merchants', $merchant);
        $user['userID'] = $this->getUserID('name', $merchant['Name'])[0]->userID;
        $this->db->insert('users', $user);
    }

    public function getUserID($attr, $val)
    {
        $this->db->select('userID');
        $this->db->select('Name');
        $this->db->where($attr, $val);
        $query = $this->db->get('merchants');
        return $query->result();
    }

    public function ImgDetails($data)
    {
        $this->db->insert('productimage', $data);
    }

    public function getProductID($data)
    {
        $this->db->select('ProductID');
        $this->db->where($data);
        $query = $this->db->get('products');
        return $query;
    }
    public function GetMarket($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('UserID', $id);
        $this->db->where('is_Available', 0);
        $this->db->join('productimage', 'productimage.ProductID = products.ProductID');
        $query = $this->db->get()->result();
        return $query;
    }
    public function GetStockDetails($pid)
    {
        $this->db->select('Stock');
        $this->db->from('sizes');
        $this->db->where('ProductID', $pid);
        $query = $this->db->get()->result();
        return $query;
    }
    public function SetTotalStock($pid, $TotalStock)
    {
        $data = array(
            'TotalStock' => $TotalStock,

        );

        $this->db->where('ProductID', $pid);
        $this->db->update('products', $data);
    }
    public function UploadSize($data)
    {
        $this->db->insert('sizes', $data);
    }
    public function NewProduct($products)
    {
        $query =  $this->db->insert('products', $products);
    }
    public function UserSummary($where)
    {
        $this->db->select('*');
        $this->db->from('merchants');
        $this->db->join('users', 'users.UserID = merchants.UserID');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function GetUserDetails($uid)
    {

        $this->db->select('*');
        $this->db->from('merchants');
        $this->db->where('UserID', $uid);
        $query = $this->db->get()->result();
        return $query;
    }
    public function GetProductDetails($ProductID)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('sizes', 'sizes.ProductID = products.ProductID');
        $this->db->join('productimage', 'productimage.ProductID = products.ProductID');
        $this->db->where('products.ProductID', $ProductID);
        $query = $this->db->get();
        return $query->result();
    }
    public function GetOrderDetails($OrderID)
    {
        $this->db->select('*');
        $this->db->from('order_items');

        $this->db->where('OrderID', $OrderID);
        $query = $this->db->get();
        return $query->result();
    }
    public function GetDispatchOrderDetails($id)
    {
        $this->db->select('*');
        $this->db->from('dispatch');
        $this->db->where('OrderID', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function DispatchOrder($data)
    {
        $this->db->insert('dispatch', $data);
        $status = array(
            // 'status' => 'DISPATCHED',
            'status' => 'DISPATCHED',
        );
        $this->db->where('OrderID', $data['OrderID']);
        $this->db->update('order_items', $status);
    }
    public function PrintOrder($oid)
    {
        $status = array(
            'status' => 'CONFIRMED',
            // 'status' => 'DISPATCHED',
        );
        // $this->db->insert('dispatch', $status);
        $this->db->where('OrderID', $oid);
        $this->db->update('order_items', $status);
    }

    public function ProductSummary()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('sizes', 'sizes.ProductID = products.ProductID');
        $this->db->join('productimage', 'productimage.ProductID = products.ProductID');
        $query = $this->db->get();
        return $query->result();
    }

    public function NewOrder($data)
    {
        $this->db->insert('order_items', $data);
    }

    public function GetOrderSummary($data)
    {
        $this->db->select('*');
        $this->db->from('order_items');

        $this->db->order_by("OrderID desc");
        if ($data != NULL) {
            $this->db->where($data);
        }
        // $this->db->join('dispatch', 'dispatch.OrderID = dispatch.OrderID');
        $query = $this->db->get();
        return $query->result();
    }



    public function GetStock($data)
    {
        $this->db->select('Stock');
        $this->db->from('sizes');
        $this->db->where($data);
        $query = $this->db->get()->result();
        return $query;
    }
    public function UpdateStock($where, $stock, $Qty)
    {
        $data = array(
            'Stock' => $stock,
        );
        $this->db->where($where);
        $this->db->update('sizes', $data);
        // -----------------------
        $this->db->select('TotalStock');
        $this->db->from('products');
        $this->db->where('ProductID', $where['ProductID']);
        $query = $this->db->get()->result()[0];
        // -------------------------------
        $totalStock = $query->TotalStock;
        $newStock = $totalStock - $Qty;
        echo "total stock " . $newStock . " <br>";
        $NewTotalStock = array(
            '	TotalStock' => $newStock,
        );
        $this->db->where('ProductID', $where['ProductID']);
        $this->db->update('products', $NewTotalStock);
    }

    public function UpdateCredit($where, $credits)
    {
        $data = array(
            'Credits' => $credits,
        );
        $this->db->where($where);
        $this->db->update('merchants', $data);
    }
    public function UpdateSheet($data)
    {
        $this->db->insert('balancesheet', $data);
    }
    public function UpdateProduct($where, $data, $imgdata)
    {
        $this->db->where($where);
        $this->db->update('products', $data);
        $this->db->where($where);
        $this->db->update('productimage', $imgdata);
    }

    public function UpdateUserDetails($data, $val)
    {

        $where = array(
            'UserID' => $val,
        );
        $this->db->where($where);
        $this->db->update('merchants', $data);
    }
    public function UpdateFreeDay($where, $val)
    {

        $data = array(
            'FreeDay' => $val,
        );
        $this->db->where($where);
        $this->db->update('products', $data);
    }
    public function GenerateBill()
    {
        $this->db->select('ProductID');
        $this->db->from('products');
        $pId = $this->db->get()->result();
        $count = count($pId);
        for ($i = 1; $i <= $count; $i++) {
            $query = $this->Model->GetProductDetails($i);

            //GEting Things
            $TotalStock = $query[0]->TotalStock;
            $ProductDate = $query[0]->Date;
            $FreeDays = $query[0]->FreeDay;

            // echo "<br>Product ID: " . $query[0]->ProductID;

            // echo "<br><br>Total Stock Available:  " . $TotalStock . "<br><br><br> ";

            if ($TotalStock > 0) {                            //Stock Available..

                // echo "Product Date is: " .  $ProductDate . "<br><br>";
                $today = date('Y-m-d');
                // echo "Today Date is: " . $today . "<br><br>";

                $diff = date_diff(date_create($ProductDate), date_create($today));

                $DifferenceInDays = $diff->days;

                // echo "Difference in  Date is: " . $DifferenceInDays . " Days <br><br>";

                // echo "DifferenceDays/FreeDays = : " . ((($DifferenceInDays) / 30)) . " &nbsp;  from Date of Product add   <br> <br> ";

                if ((($DifferenceInDays) / $FreeDays) <= 1) {
                    // echo "Free Day's Not Finished Yet!";
                } else {

                    // echo "Credits to be Debited is : (Total Stock) " . $TotalStock . " X " . 5 . "  (Cost Per Month) = ₹ " .  ($TotalStock) * 5;
                    $debitAmount = (($TotalStock) * 5);
                    // echo "<br>User ID: " . $query[0]->UserID;
                    // echo "<br>Product ID: " . $query[0]->ProductID;
                    // echo "<br>Stock Available: " . $query[0]->Stock;
                    // echo "<br>Debit Amount: " . $debitAmount;
                    $NewFreeDays = $FreeDays + 30;
                    // echo "<br> New FreeDays: (+30) :" . $NewFreeDays;





                    $rish['UserID'] =  $query[0]->UserID;
                    $rish['ProductID'] =  $query[0]->ProductID;
                    $rish['StockAvailable'] = $query[0]->Stock;
                    $rish['Debit'] = $debitAmount;
                    $rish['Credit'] = NULL;
                    $rish['FreeDays'] = 30;

                    $this->Model->UpdateSheet($rish);

                    $where['UserID'] =  $query[0]->UserID;
                    $where['ProductID'] =  $query[0]->ProductID;

                    $this->Model->UpdateFreeDay($where, $NewFreeDays);
                    // ---------------
                    // ---------------
                    $UDetails = $this->Model->GetUserDetails($query[0]->UserID);
                    $AvailCredits = $UDetails[0]->Credits;
                    // $StartDebit = 5;
                    $NewCredits = $AvailCredits - $debitAmount;
                    // echo $NewCredits;
                    $uWhere = array(
                        'UserID' => $query[0]->UserID,
                        'Type' => 'Vendor'
                    );
                    $this->Model->UpdateCredit($uWhere, $NewCredits);
                    //-----------------



                    // $FreeDays = +30;
                }
                // $freedays = 30;


                // echo $diff->format('%y');


            }
        }
    }

    public function StorageBilling($data)
    {
        $this->db->select('*');
        $this->db->from('balancesheet');
        $this->db->where($data);
        $query = $this->db->get()->result();
        return $query;
    }

    public function GetImageDetails($ProdID)
    {

        $this->db->select('*');
        $this->db->from('productimage');
        $this->db->where('ProductID',$ProdID);
        $query = $this->db->get()->result();
        return $query;
    }
    public function DeleteProd($id)
    {
        $tables = array('balancesheet', 'sizes', 'productimage', 'products');
        $this->db->where('ProductID', $id);
        $this->db->delete($tables);

    }
    public function RevokeUserAccess($id)
    {
        $data = array(
            'is_Authorized' => 1
        );
        $this->db->where('UserID', $id);
        $this->db->update('merchants', $data);
    }
    public function dispatchDetails($id)
    {
        $this->db->select('*');
        $this->db->from('order_items');
        $this->db->join('products', 'products.ProductID = order_items.ProductID');
        $this->db->where('OrderID', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function Updatepassword($pwd, $uid)
    {
        $data = array(
            'password' => $pwd
        );
        $this->db->where('UserID', $uid);
        $this->db->update('users', $data);
    }

    public function SendMsg($no, $Company, $TrackNo)
    {

        // Account details
        $apiKey = urlencode('KtVYnTbjtmQ-yGIPPc7DdU3XYASutSSp4aizOSZmGt');

        // Message details
        $contact = '91' . $no;
        $numbers = array($contact);
        $sender = urlencode('SHTRND');
        $com = urlencode($Company);
        $Track = urlencode($TrackNo);


        // $message = rawurlencode('Shipped: Your package has been shipped successfully.Courier Partner:'.$com.'Tracking Number:'.$Track.'Thank you for shopping with us.');
        $message = rawurlencode('Shipped: Your package has been shipped successfully.%nCourier Partner: ' . $com . '%nTracking Number: ' . $Track . '%nThank you for shopping with us.');
        // $message = rawurlencode('Hello Testing');
        // https://api.textlocal.in/send/?apikey=KtVYnTbjtmQ-yGIPPc7DdU3XYASutSSp4aizOSZmGt&numbers=918078662861&message=Shipped: Your package has been shipped successfully.%nCourier Partner: x%nTracking Number: x%nThank you for shopping with us.&sender=SHTRND

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Process your response here
        return $response;
    }
}
