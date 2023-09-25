<?php

use app\core\Controller;
use app\models\Auth;

class Packages extends Controller
{
    protected $userM;
    protected $companyM;
    protected $packagesM;
    protected $fetch;
    protected $orderM;
    protected $paymentM;

    public function __construct()
    {
        $this->userM = $this->load_model('user');
        $this->companyM = $this->load_model('company');
        $this->packagesM = $this->load_model('package');
        $this->orderM = $this->load_model('orders');
        $this->paymentM = $this->load_model('payment');

        $this->fetch = file_get_contents("php://input");
        $this->fetch = json_decode($this->fetch);

        if (!(is_object($this->fetch))) {
            $this->fetch = (object) $_POST;
        }
    }

    public function index()
    {
        $data = [];
        $data['page_title'] = 'Create Package';

        $user = Auth::logged_in();
        if(!$user) $this->redirect('login');        // check if login

        //  show($user); die;

        // redirect if not admin or customer
        if (!Auth::access('admin') && !Auth::access('customer')) 
        $this->redirect('dashboard');
        
        $packages = $this->packagesM->get_package_order_by_userID($user->userID);
    
        if($packages) {
            $data['pacakges'] = $packages;
            // // loop through and set status
            foreach($packages as $package) {
                $package->packageStatus = '';
                $package->statusCol = '';
                
                if($package->deliveryStatus == PENDING_PACKAGE) {
                    $package->packageStatus = 'pending';
                    $package->statusCol = 'warning';
                }  

                if($package->deliveryStatus == PACKAGE_FAILED) {
                    $package->packageStatus = 'failed';
                    $package->statusCol = 'danger';
                }

                if ($package->deliveryStatus == APPROVED_PACKAGE) {
                    $package->packageStatus = 'approved';
                    $package->statusCol = 'info';
                }

                if ($package->deliveryStatus == DELIEVRED_PACAKGES) {
                    $package->packageStatus = 'delivered';
                    $package->statusCol = 'success';
                }

                if ($package->deliveryStatus == CANCELED_PACKAGE) {
                    $package->packageStatus = 'cancelled';
                    $package->statusCol = 'info';
                }

                if($package->paymentMethod == 'Card') {
                    $package->paymentMethod = 'Card';
                } else {
                    $package->paymentMethod = 'Cash on delivery';
                }

                // for dates
                // pickup date
                $pickupDateArr = explode('-',$package->pickUpDate); 
                $package->pickUpDate = date("F j", mktime(0, 0, 0, $pickupDateArr[1], $pickupDateArr[0]));

                // delivery date
                $deliveryDateArr = explode('-', $package->deliveryDate);
                $package->deliveryDate = date("F j", mktime(0, 0, 0, $deliveryDateArr[1], $deliveryDateArr[0]));

            }
        }

        // check if rank is customer
        if($user->role == 'customer') {
            $data['senderInfo'] = true;
        } else {
            $data['senderInfo'] = false;
        }

        $data['senderName'] = $user->fullName;
        $data['senderMail'] = $user->email;
        $data['senderPhone'] = $user->phone;
        $data['senderAddress'] = $user->address ?? '';
        $data['role'] = $user->role;
       // show($data); die;

        if($user->role == 'customer') {
            // get active delivery companies bases on location
            $data['companies'] = $this->companyM->get_delivery_company_by_location($user->state, $user->lga);   
        } else {
            $data['companies'] = $this->companyM->get_company_by_owner($user->userID);
        }
        

        $data['uri'] = ROOT;

        // send package details and order details to screen
        $this->view("create_package", $data);
    }


    public function registerPackage() {

        $user = Auth::logged_in();
        if (!$user)
        $this->redirect('login');

        // Validate input in future time
      // show($this->fetch); die;

        if(!isObjectEmpty($this->fetch)) {
            $this->fetch->senderID = $user->userID;
            $save_receiver = $this->packagesM->store_receiver($this->fetch);
            $package_store = $this->packagesM->store_package($this->fetch, $save_receiver->receiverID);

            // check if paymenet method is online and save payment
            if ($this->fetch->paymentMethod == 'Card' && is_object($package_store)) {
                $this->fetch->payment_status = PAID;
                
                // save paid order and add to payment
                $save_orders = $this->orderM->store_orders($this->fetch, $package_store->packageID); 
                $this->paymentM->store_payment($this->fetch, $save_orders->orderID);

            } 

            // add online orders that are not paid
            if($this->fetch->paymentMethod == 'Cash on delivery' && is_object($package_store)) {
                // save paid order 
                $this->fetch->payment_status = NOT_PAID;
                $this->orderM->store_orders($this->fetch, $package_store->packageID); 
            }

            // store tracking order
            $package = $this->packagesM->get_package_order_by_userID($this->fetch->senderID);
            $lastInsertedPackage = count($package) - 1;
            $packageID = $package[$lastInsertedPackage]->packageID;
            $packageTracker = $this->packagesM->package_tracker_update($packageID, PENDING);

            if($packageTracker) {
                $packageById = $this->packagesM->get_package_id($packageID);
                $this->packagesM->update_tracking($packageById->trackingID, $packageID, PENDING);
            }

            
            // return json data of order of package and all
            $last_updated = [];
            $packageOrder = $this->packagesM->get_all_package_order();
            $last_index = count($packageOrder) - 1;
            if($last_index >= 0) {
                $last_updated = $packageOrder[$last_index];
            }

            $data['status'] = 'success';
            $data['message'] = 'Order succesfully booked, wait for confirmation';
            $data['uri'] = ROOT;
            $data['images'] = IMAGES;
            $data['last_updated'] = $last_updated;
        }
         //  show($data); die;

        echo json_encode($data);
       
    }

    public function cancel_order() {
        $user = Auth::logged_in();
        if (!$user) $this->redirect('login');

        // change status of both package and orders
       $cancelOrder = $this->orderM->cancel_order($this->fetch->orderID, ORDER_CANCELLED);
       $updatePackageStatus = $this->packagesM->cancel_package($this->fetch->packageID, CANCELED_PACKAGE);

       // update tracker
       $package = $this->packagesM->get_package_id($this->fetch->packageID);
       $this->packagesM->update_tracking($package->trackingID, $this->fetch->packageID, CANCELD_ITEM);

       if($cancelOrder && $updatePackageStatus) {
          // send json back
          $data['status'] = 'success';
          $data['message'] = 'Order cancelled successfully';

          echo json_encode($data);
       } else {
            $data['status'] = 'failed';
            $data['message'] = 'Oops an error occurred';

            echo json_encode($data);
       }
    }

    public function delete_package() {
        $user = Auth::logged_in();
        if (!$user) $this->redirect('login');

        //show($this->fetch); die;

        $disable_package = $this->packagesM->disable_package($this->fetch->packageID, PACKAGE_DISABLED);

        if($disable_package) {
            $data['status'] = 'success';
            $data['message'] = 'Package delete succesfully';
            $data['images'] = IMAGES;

            echo json_encode($data);
        } else {
            $data['status'] = 'failed';
            $data['message'] = 'Unable to perform operation';

            echo json_encode($data);
        }
        
    }

    public function retrive_package() {
        $user = Auth::logged_in();
        if (!$user) $this->redirect('login');
        
        $packages = $this->packagesM->get_package_id($this->fetch->packageID);
        if(is_object($packages)) {
            $data['packages'] = $packages;
            $data['sender'] = $this->userM->get_user($user->userID);
            $data['images'] = IMAGES;
            $data['uri'] = ROOT;
            $data['status'] = 'success';
            
            echo json_encode($data);
        } else {
            $data['status'] = 'failed';
            $data['message'] = 'unable to get data';

            echo json_encode($data);
        }
    } 
    
    public function editPackage() {
        if(!isObjectEmpty($this->fetch)) {
            $edit_package = $this->packagesM->edit_package($this->fetch, $this->fetch->packageID);
            
            if($edit_package) {
                // get the reciver for that package
                $packageOrder = $this->packagesM->get_package_id($this->fetch->packageID);
                $this->packagesM->edit_receiver($this->fetch, $packageOrder->receiverID);
                $this->orderM->edit_orders($this->fetch, $packageOrder->orderID); 
            }
            
            // send request back 
            $data['message'] = 'Package succesfully edited';
            $data['status'] = 'success';
            $data['editedPackage'] = $packageOrder;// = $this->packagesM->get_package_id($this->fetch->packageID);

            echo json_encode($data);
        }
    }

    public function track_package($trackingID)
    {

        // check authentication
        $user = Auth::logged_in();
        if(!$user) $this->redirect('login');   

        // check for access admin or user
        if($user->role == DRIVER) $this->redirect('dashboard');
        
        // read tracking id data
        $data['page_title'] = 'Track Package';
        
        // get all tracking datas
            $trackers = $this->packagesM->getTrackerById($trackingID);
            if(is_array($trackers)) {
                // get comany name
                $data['companyName'] = $this->companyM->getPackageCompany($trackingID)->companyName;
                $packageID = '';
                
                // loop through and fix status time of tracker
                foreach($trackers as $tracker) {
                    // format time
                    $dateTime = explode(' ', $tracker->status_time);
                    $time = date("h:i A", strtotime($tracker->status_time));
                    $tracker->status_time = $time; 

                    // get receiver
                    $tracker->recieverName = $this->packagesM->get_package_orders($tracker->package_id)->receiverName;
                    $packageID = $tracker->package_id;
                }

                
                // calculate estimated delivery time
                $currentTime = strtotime(date('Y-m-d H:i:s', time()));
                
                $deliveryDateTime = $this->packagesM->get_package_orders($packageID)->deliveryDate;
                $deliveryTimestamp = strtotime($deliveryDateTime);
                
                
                //  $data['estimatedTime'] = $this->packagesM->get_package_orders($packageID)->deliveryDate;
                
                $data['trackers'] = $trackers;
                $currentTrack = (array) $trackers[count((array) $trackers) - 1];
                $currentTrack = $currentTrack['status_description'];
                
                $data['packagesItmes'] = json_decode($this->packagesM->getPackageByTracker($trackingID)->packageItems);

                // format messages 
                if(($currentTime > $deliveryTimestamp) && $currentTrack != ITEMDELIVERED) {
                    $data['delayed'] = true;
                } else {
                    $data['delayed'] = false;
                }

                $data['currentTrack'] = $currentTrack;
                
                // show($data); die;
                // calculate estimated delivery time
                // get all packages for a specific order
                
              //  show($data); die;

                $this->view("tracking_page", $data);
                return;
            }
                
            echo "NO TRACKER FOUND";
            // $this->view();
        }
}