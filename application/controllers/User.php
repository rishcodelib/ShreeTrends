<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$head['title'] = 'Login';
		$this->load->view('assets/header.php', $head);
		$this->load->view('Layout/common/login.php');
		$this->load->view('assets/footer.php');
	}
	public function VendorView($id)
	{
		if ($this->session->has_userdata('user') != Null) {

			$result = $this->Model->GetMarket($id);
			echo json_encode($result);
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}

	public function Home()
	{
		if ($this->session->has_userdata('user') != Null) {

			$result['userID'] = $this->Model->getUserID('type', 'Vendor');
			// $this->Model->GenerateBill();
			$head['title'] = 'Login';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/admin/Home.php', $result);
			$this->load->view('assets/footer.php');
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}



	public function market()
	{
		if ($this->session->has_userdata('user') != Null) {
			// echo( $this->session->userdata('user')->UserID);
			$result['view'] = $this->Model->GetMarket($this->session->userdata('user')->UserID);
			$head['title'] = 'Market View';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/vendor/market.php', $result);
			$this->load->view('assets/footer.php');
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}





	// Common for both
	public function settings()
	{
		if ($this->session->has_userdata('user') != Null) {
			$btn = $this->input->post('updatePwd');

			if (isset($btn) != NULL) {
				$uid = $this->session->userdata('user')->UserID;
				$newpwd = $this->input->post('updatepassword');
				// $this->Model->Updatepassword($newpwd, $uid);
				// $this->session->set_flashdata('success', 'Password Updated Sucessfully');
				$this->session->set_flashdata('success', 'Password Update Fetaure is Disabled due to TESTING , Feature Working fine');
				redirect("/User/settings");
			} else {
				$head['title'] = 'Item View';
				$this->load->view('assets/header.php', $head);
				$this->load->view('Layout/common/navbar.php');
				$this->load->view('Layout/common/settings.php');
				$this->load->view('assets/footer.php');
			}
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}

	//Admin Interface 
	public function addProduct()
	{
		if ($this->session->has_userdata('user') != Null) {

			$submit = $this->input->post('submit');
			$rish['UserID'] = $this->input->post('VendorID');
			$rish['ProductName'] = $this->input->post('ProdName');
			$rish['ProductDesc'] = $this->input->post('ProdDesc');
			$rish['price'] = $this->input->post('ProdAmt');
			$rish['FreeDay'] = 30;
			$rish['is_Available'] = 0;

			// $img = $this->input->post('productImage');


			if (isset($submit) != NULL) {
				//POST DATA <-- Done ----------------------->
				if (empty($rish)) {
					$this->session->set_flashdata('Reject', " No Data to Accept ");
					$this->session->set_flashdata('UploadRejected', $this->upload->display_errors());
					redirect("/User/AddProduct");
				} else {
					$this->Model->NewProduct($rish);
					$data = array(
						'UserID' => $rish['UserID'],
						'ProductName' => $rish['ProductName']
					);

					$ProductID = ($this->Model->GetProductID($data)->result())[0]->ProductID;

					$this->session->set_flashdata('Success', "Product Added Successfully");
					// redirect("/User/AddProduct");

					$data['size'] = $this->input->post('size');
					$data['stock'] = $this->input->post('stock');
					$size = sizeof($data['size']);

					for ($a = 0; $a <= ($size - 1); $a++) {
						$rishabh['ProductID'] = $ProductID;
						$rishabh['Size'] =  $data['size'][$a];
						$rishabh['Stock'] = $data['stock'][$a];
						$this->Model->UploadSize($rishabh);
					}


					// Total Stock Update ---------------

					$GetStock = $this->Model->GetStockDetails($ProductID);
					$stock = $GetStock;
					$sum = 0;
					foreach ($stock as $val) {
						echo $val->Stock . "<br>";
						$sum += $val->Stock;
					}
					$this->Model->SetTotalStock($ProductID, $sum);

					// Total Stock Update ---------------

					// Credits Update (start) ____________________________________________________

					$UDetails = $this->Model->GetUserDetails($rish['UserID']);
					$AvailCredits = $UDetails[0]->Credits;
					$DebitCalc = (20 * $sum);
					$NewCredits = $AvailCredits - $DebitCalc;
					echo $NewCredits;
					$where = array(
						'UserID' => $rish['UserID'],
						'Type' => 'Vendor'
					);
					$this->Model->UpdateCredit($where, $NewCredits);


					// Credits Update (Ends)____________________________________________________


					// Update balance Sheet------------

					$Bsheet['UserID'] =  $rish['UserID'];
					$Bsheet['ProductID'] = $ProductID;
					$Bsheet['StockAvailable'] = $sum;
					$Bsheet['Credit'] = $NewCredits;
					$Bsheet['Debit'] = $DebitCalc;
					$Bsheet['FreeDays'] = 30;
					$this->Model->UpdateSheet($Bsheet);

					// Update balance Sheet------------





					//POST DATA <-- Done -----------------------> 
					$directory =  './assets/images/uploads/';
					if (!is_dir($directory . $rish['UserID'] . '/')) {
						mkdir($directory . $rish['UserID'] . '/', 0777, TRUE);
					}

					$config['upload_path']  = './assets/images/uploads/' . $rish['UserID'] . "/";
					$config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
					$config['max_size'] = '2000';
					$config['max_width'] = '10000';
					$config['max_height'] = '10000';
					$config['remove_spaces'] = TRUE;
					$config['detect_mime'] = TRUE;
					$config['file_ext_tolower'] = TRUE;
					$config['file_name'] = $ProductID;

					$this->load->library('upload', $config);


					if ($this->upload->do_upload('productImage')) {
						// Image upload
						$imageData = $this->upload->data();
						$img['ProductID'] = $ProductID;
						$img['ImageName'] = $imageData['file_name'];
						$img['ImagePath'] = '/assets/images/uploads/' . $rish['UserID'] . "/";
						$this->Model->ImgDetails($img);
						$this->session->set_flashdata('UploadSuccess', "Image Upload  Success");
						$this->session->set_flashdata('path', '/assets/images/uploads/' . $rish['UserID'] . "/" . $imageData['file_name']);

						// Add Sizes ---------------------

						redirect('/User/AddProduct/');
						// ---------------------

					} else {
						$this->session->set_flashdata('UploadRejected', $this->upload->display_errors());
						$this->session->set_flashdata('NoImage', 'Image Format is Incorrect, Please Update ');
						$img['ProductID'] = $ProductID;
						$img['ImageName'] = 'temp_image.png';
						$img['ImagePath'] = '/assets/images/';
						$this->Model->ImgDetails($img);
						$this->session->set_flashdata('UserID', $rish['UserID']);
						$this->session->set_flashdata('ProductID', $ProductID);
						redirect('/User/UpdateProduct/' . $ProductID);
					}
					// <-- Done -->

					// <-- -->
				}
			} else {
				$result['userID'] = $this->Model->getUserID('type', 'Vendor');
				$head['title'] = 'Add Product';
				$this->load->view('assets/header.php', $head);
				$this->load->view('Layout/common/navbar.php');
				$this->load->view('Layout/admin/AddProduct.php', $result);
				$this->load->view('assets/footer.php');
			}
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}


	public function UpdateProduct($ProductID)
	{
		$submit = $this->input->post('submit');
		if (isset($submit) != NULL) {


			$rish['UserID'] = $this->input->post('VendorID');
			$rish['ProductName'] = $this->input->post('ProdName');
			$rish['ProductDesc'] = $this->input->post('ProdDesc');
			$rish['price'] = $this->input->post('ProdAmt');

			$where = array(
				'ProductID' => $ProductID,
			);
			// print_r($rish);

			$directory =  './assets/images/uploads/';
			if (!is_dir($directory . $rish['UserID'] . '/')) {
				mkdir($directory . $rish['UserID'] . '/', 0777, TRUE);
			}

			$config['upload_path']  = './assets/images/uploads/' . $rish['UserID'] . "/";
			$config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
			$config['max_size'] = '2000';
			$config['max_width'] = '10000';
			$config['max_height'] = '10000';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$config['detect_mime'] = TRUE;
			$config['file_ext_tolower'] = TRUE;
			$config['file_name'] = $ProductID;

			$this->load->library('upload', $config);


			if ($this->upload->do_upload('productImage')) {
				// Image upload
				$imageData = $this->upload->data();
				$img['ImageName'] = $imageData['file_name'];
				$img['ImagePath'] = '/assets/images/uploads/' . $rish['UserID'] . "/";
				$this->Model->UpdateProduct($where, $rish, $img);
				// $this->Model->ImgDetails($img);
				$this->session->set_flashdata('UploadSuccess', "Image Upload  Success");
				$this->session->set_flashdata('path', '/assets/images/uploads/' . $rish['UserID'] . "/" . $imageData['file_name']);

				// Add Sizes ---------------------

				redirect('/User/AddProduct/');
				// ---------------------

			} else {
				$this->session->set_flashdata('UploadRejected', $this->upload->display_errors());
				// $this->session->set_flashdata('NoImage', 'Image Format is Incorrect, Please Update ');
				// $img['ProductID'] = $ProductID;
				// $img['ImageName'] = 'temp_image.png';
				// $img['ImagePath'] = '/assets/images/';
				// $this->Model->ImgDetails($img);
				// $this->session->set_flashdata('UserID', $rish['UserID']);
				// $this->session->set_flashdata('ProductID', $ProductID);
				redirect('/User/UpdateProduct/' . $ProductID);
			}
			// <-- Done -->

		} else {

			$data['details'] = $this->Model->GetProductDetails($ProductID);
			$head['title'] = 'Update Product';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/admin/UpdateProduct.php', $data);
			$this->load->view('assets/footer.php');
		}
	}
	public function RevokeAccess($id)
	{
		$this->Model->RevokeUserAccess($id);
		$this->session->set_flashdata('Reject', 'Access Revoked of user, with User ID: ' . $id);
		redirect("user/ManageUser");
	}
	public function UpdateUser($UserID)
	{
		$btn = $this->input->post('submit');
		if (isset($btn)) {
			$id = $UserID;
			$data['Name'] = $this->input->post('Name');
			$data['ContactNo'] = $this->input->post('Contactno');
			$data['Credits'] = $this->input->post('Credits');
			$data['EmailID'] = $this->input->post('Email');
			$data['is_Authorized'] = 0;
			$this->Model->UpdateUserDetails($data, $id);
			$this->session->set_flashdata("Success", "User Updated Successfully");
			$this->session->set_flashdata("Other", "User Access Granted Successfully");
			redirect("user/ManageUser");
		}


		$data['details'] = $this->Model->GetUserDetails($UserID);

		$head['title'] = 'Update User';
		$this->load->view('assets/header.php', $head);
		$this->load->view('Layout/common/navbar.php');
		$this->load->view('Layout/admin/UpdateUser.php', $data);
		$this->load->view('assets/footer.php');
	}

	public function ManageUser()
	{
		if ($this->session->has_userdata('user') != Null) {
			$where = array('type' => 'Vendor');
			$rish['UserDetails'] = $this->Model->UserSummary($where);
			$head['title'] = 'Manage Users';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/admin/ManageUsers.php', $rish);
			$this->load->view('assets/footer.php');
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}

	public function OrderDispatch($id)
	{
		if ($this->session->has_userdata('user') != Null) {
			$btn = $this->input->post('submit');
			if (isset($btn)) {
				$rish['OrderID'] = $this->input->post('oID');
				$rish['UserID'] = $this->input->post('uID');
				$rish['Consignment_No'] = $this->input->post('ConsNbr');
				$rish['Company_name'] = $this->input->post('company');
				$Contactno = $this->input->post('contactno');
				$this->Model->DispatchOrder($rish);
				$msg = $this->Model->SendMsg($Contactno, $rish['Company_name'], $rish['Consignment_No']);


				$this->session->set_flashdata('Success', 'Tracking ID is Added Successfully SMS Status:' . $msg);
				redirect("user/ManageOrders");
			}
			$data['dispatchDetails'] = $this->Model->GetDispatchOrderDetails($id);

			$data['details'] = $this->Model->GetOrderDetails($id);
			$head['title'] = 'Order Dispatch';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/admin/OrderDispatch.php', $data);
			$this->load->view('assets/footer.php');
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}
	public function DispatchDetails($id)
	{
		if ($this->session->has_userdata('user') != Null) {
		
			$data['dispatchDetails'] = $this->Model->GetDispatchOrderDetails($id);
		
			$data['details'] = $this->Model->GetOrderDetails($id);
			$head['title'] = 'Order Dispatch';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/vendor/DispatchDetails.php', $data);
			$this->load->view('assets/footer.php');
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}
	public function CreateVendor()
	{
		$submit = $this->input->post('submit');
		$rish['Name'] = $this->input->post('Name');
		$rish['ContactNo'] = $this->input->post('Contact');
		$rish['Credits'] = $this->input->post('Credits');
		$rish['EmailID'] = $this->input->post('email');
		$rish['type'] = $this->input->post('type');
		$rish['is_Authorized'] = 0;

		$user['Name'] = $this->input->post('Name');
		$user['Username'] = $this->input->post('username');
		$user['password'] = $this->input->post('username');
		if (isset($submit) != NULL) {
			$this->Model->signup($rish, $user);
			$this->session->set_flashdata('UserSuccess', "User Created Successfully");
			redirect("/User/CreateVendor/");
		} else {
			$head['title'] = 'Create Vendor';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/admin/CreateVendor.php');
			$this->load->view('assets/footer.php');
		}
	}
	// Vendor 


	public function ManageProducts()
	{
		if ($this->session->has_userdata('user') != Null) {
			$rish['ProdDetails'] = $this->Model->ProductSummary();
			$head['title'] = 'Manage Products';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/admin/ManageProducts.php', $rish);
			$this->load->view('assets/footer.php');
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}

	public function ManageOrders()
	{
		$data = NULL;
		$data['details'] = $this->Model->GetOrderSummary($data);
		$head['title'] = 'Manage Orders';
		$this->load->view('assets/header.php', $head);
		$this->load->view('Layout/common/navbar.php');
		$this->load->view('Layout/admin/ManageOrders.php', $data);
		$this->load->view('assets/footer.php');
	}

	public function cart()
	{
		if ($this->session->has_userdata('user') != Null) {

			$item = (object) array(['ProductID' => 212, 'Quantity' => 2]);
			$data['pdetails'] = $this->session->set_userdata('product', $item);
			$head['title'] = 'Cart';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/Common/cart.php', $data);
			$this->load->view('assets/footer.php');
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/");
		}
	}

	public function GetStoreDetails($id)
	{
		$result = $this->Model->GetMarket($id);
		echo json_encode($result);
	}
	public function AdminStorageBilling()
	{
		$where = array();


		$data['bill'] = $this->Model->StorageBilling($where);

		$data['userID'] = $this->Model->getUserID('type', 'Vendor');

		$head['title'] = 'Vendor Storage Billing';
		$this->load->view('assets/header.php', $head);
		$this->load->view('Layout/common/navbar.php');
		$this->load->view('Layout/admin/StorageBilling.php', $data);
		$this->load->view('assets/footer.php');
	}

	public function VendorStorageBilling()
	{




		$where = array(
			'UserID' => $this->session->userdata('user')->UserID
		);


		$data['bill'] = $this->Model->StorageBilling($where);

		$data['userID'] = $this->Model->getUserID('type', 'Vendor');


		$head['title'] = 'Vendor Storage Billing';
		$this->load->view('assets/header.php', $head);
		$this->load->view('Layout/common/navbar.php');
		$this->load->view('Layout/vendor/StorageBilling.php', $data);
		$this->load->view('assets/footer.php');
	}

	public function ViewStatus()
	{
		$data = array(
			'UserID' => $this->session->userdata('user')->UserID
		);
		$data['details'] = $this->Model->GetOrderSummary($data);
		$head['title'] = 'View Order Status';
		$this->load->view('assets/header.php', $head);
		$this->load->view('Layout/common/navbar.php');
		$this->load->view('Layout/vendor/ViewOrderStatus.php', $data);
		$this->load->view('assets/footer.php');
	}

	public function itemView($id)
	{
		if ($this->session->has_userdata('user') != Null) {

			$btn = $this->input->post('submit');
			$order['pid'] = $this->input->post('pid');
			$order['size'] = $this->input->post('size');
			$order['quant'] = $this->input->post('quant');

			if (isset($btn)) {
				$data['order'] = $this->Model->GetProductDetails($order['pid']);
				$this->session->set_userdata('ProductDetails', $data);
				$this->session->set_userdata('OrderDetails', $order);
				redirect('user/checkoutpage/');
			} else {
				$data['details'] = $this->Model->GetProductDetails($id);
				$head['title'] = 'Item View';
				$this->load->view('assets/header.php', $head);
				$this->load->view('Layout/common/navbar.php', $order);
				$this->load->view('Layout/vendor/itemview.php', $data);
				$this->load->view('assets/footer.php');
			}
		} else {
			$this->session->set_flashdata("InvalidAccess", "Invalid Access ");
			redirect("/market");
		}
	}
	public function checkoutpage()
	{
		$user = ($this->session->userdata('user'));
		$Order = ($this->session->userdata('OrderDetails'));
		$Product = ($this->session->userdata('ProductDetails')['order'][0]);
		$Pval =  $Product->price;
		$Qty = $Order['quant'];
		$size = $Order['size'];
		$sDetails = array(
			'ProductID' => $Order['pid'],
			'Size' =>  $size
		);
		$AvailStock = $this->Model->GetStock($sDetails)[0]->Stock;
		if ($AvailStock >= $Qty) {
			$stock = ($AvailStock) -  ($Qty);
			$this->session->set_flashdata('Available', 'Selected Stock is Available');
		} else {
			$this->session->set_flashdata('NotAvailable', 'Stock not Available');
		}
		$Total = $Pval * $Qty;
		$btn = $this->input->post('PlaceOrder');
		if ((isset($btn)) != NULL) {
			$rish['ProductID'] = $Order['pid'];
			$rish['size'] = $size;
			$rish['UserID'] = $user->UserID;
			$rish['amount'] = $Total;
			$rish['quantity'] = $Qty;
			$rish['CustomerName'] = $this->input->post('cust_name');
			$rish['Cust_Email'] = $this->input->post('cust_email');
			$rish['Cust_Address'] = nl2br($this->input->post('cust_address'));
			$rish['Cust_phone'] = $this->input->post('cust_phone');
			// $rish['status'] = 'CONFIRMED';
			$rish['status'] = 'RECEIVED';
			$rish['Comments'] = $this->input->post('Comments');
			$where = array(
				'ProductID' => $Order['pid'],
				'Size' => $size,
			);

			$this->Model->UpdateStock($where, $stock, $Qty);
			$this->Model->NewOrder($rish);
			$this->session->unset_userdata('ProductDetails');
			$this->session->unset_userdata('OrderDetails');
			$this->session->set_flashdata('OrderSuccess', 'Order Submited Successfully');
			redirect("user/market");
		} else {
			if (($this->session->userdata('ProductDetails')) == NULL) {
				redirect("user/market");
			} else if (($this->session->userdata('OrderDetails')) == NULL) {
				redirect("user/market");
			}
			$data['ProductName'] = $Product->ProductName;
			$data['ProductDesc'] = $Product->ProductDesc;
			$data['ProductPrice'] = $Product->price;
			$data['ProductQuantity'] = 	$Qty;
			$data['TotalAmount'] = 	$Total;
			$head['title'] = 'Checkout Page';
			$this->load->view('assets/header.php', $head);
			$this->load->view('Layout/common/navbar.php');
			$this->load->view('Layout/vendor/checkoutpage.php', $data);
			$this->load->view('assets/footer.php');
		}
	}

	public function DeleteProduct($id)
	{
		$this->Model->DeleteProd($id);
		$this->session->set_flashdata("Success", "Order Deleted Successfully");
		redirect("User/ManageProducts");
	}
	public function printDetails($id)
	{
		if ($id != NULL) {
			// $data['dispatchDetails'] = $this->Model->GetDispatchOrderDetails($id);
			// ($details[0]->status)
			$var = $this->Model->GetOrderDetails($id);
			foreach ($var as $dd) {
				if ($dd->status == "DISPATCHED") {
					$this->session->set_flashdata('failed', 'Order Already Printed and Dispatched');
					redirect("user/ManageOrders");
				} else {
					$head['title'] = 'Dispatch Sheet';
					$data['details'] = $this->Model->dispatchDetails($id);
					$this->Model->PrintOrder($id);
					$this->load->view('assets/header.php', $head);
					$this->load->view("print.php", $data);
					$this->load->view('assets/footer.php');
				}
			}
			// die();

		} else {
			$this->session->set_flashdata('failed', 'No Order found');
			redirect("user/ManageOrders");
		}
	}
}
