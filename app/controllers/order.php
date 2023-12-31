<?php

use app\core\Controller;
use app\models\Auth;

class Order extends Controller
{

    protected $userM;
    protected $companyM;
    protected $packagesM;
    protected $fetch;
    protected $orderM;
    protected $paymentM;
    protected $driverM;

    public function __construct()
    {
        $this->userM = $this->load_model('user');
        $this->companyM = $this->load_model('company');
        $this->packagesM = $this->load_model('package');
        $this->orderM = $this->load_model('orders');
        $this->paymentM = $this->load_model('payment');
        $this->driverM = $this->load_model('driver');

        $this->fetch = file_get_contents("php://input");
        $this->fetch = json_decode($this->fetch);

        if (!(is_object($this->fetch))) {
            $this->fetch = (object) $_POST;
        }
    }

    public function index()
    {
        $data = [];
        $data['page_title'] = 'Orders';

       // show($_SESSION); die;
        // Limit access
        $user = Auth::logged_in();
        if (!$user)
        $this->redirect('login');

        // redirect if not admin or customer
        if (!Auth::access('admin'))
        $this->redirect('dashboard');

        // if ajax request is empty
        if(!isObjectEmpty($this->fetch)) {
            $currOrders = $this->current_orders($this->fetch->companyID);
    //show($currOrders); die;

            $data['status'] = 'success';
            $data['images'] = IMAGES;
            $data['uri'] = ROOT;
            $data['orders'] = $currOrders;
            $data['type'] = 'currentOrder';
        
            echo json_encode($data);
            return;
        }
    
        // get orders and packages
        $currOrders = $this->current_orders($user->companyID);
        
        $data['currentOrders'] = $currOrders;
        $data['drivers'] = $this->driverM->get_all_drivers_by_company_id($user->companyID, ONDUTY);
        $data['companyID'] = $user->companyID;
        $data['role'] = $user->role;
       // show($currOrders); die;

      // show($data); die;
       

        $this->view("orders", $data);
    }

    private function current_orders($companyID) {
        // get all orders and packages
        $orders = $this->orderM->get_orders_by_company_id($companyID);
        
        // loop through and check for current delivery day index and order is not unassigned
        $currentDate = strtotime(date('Y-m-d'));

        if(is_array($orders)) {
            $newArr = array_filter($orders, function ($order) use ($currentDate) {
                // array of status to find
                $status = [WAITING, PICKED_UP, STARTING, ONWAY];

                $pickupDate = strtotime($order->pickUpDate);
                if (($pickupDate == $currentDate && $order->order_status != ORDER_DELIVERED && $order->order_status != FAILED_ORDER && $order->order_status != ORDER_CANCELLED) || in_array($order->order_status, $status)) {

                    // format date
                    $newDate = $this->formatDate($order->pickUpDate, $order->deliveryDate);

                    $order->pickUpDate = $newDate[0];
                    $order->deliveryDate = $newDate[1];
                    
                    $this->statusChecker($order);
                    if (!is_null($order->driverID)) {
                        $order->driverName = $this->driverM->get_get_drivers($order->driverID);
                    } else {
                        $order->driverName = 'N/A';
                    }

                    return $order;
                }
            });

            return array_values($newArr);
        }

        return false;
    }

    public function sheduled_orders() {
        if (!isObjectEmpty($this->fetch)) {
            $sheduledOrders = $this->orderM->get_orders_by_company_id($this->fetch->companyID);
            
        //  show($sheduledOrders);

            // loop through and check for current delivery day index and order is not unassigned
            $currentDate = strtotime(date('Y-m-d'));
            if(is_array($sheduledOrders)) {
                $newArr = array_filter($sheduledOrders, function ($order) use ($currentDate) {
                    $pickupDate = strtotime($order->pickUpDate);
                    $status = [UNASSIGNED];
                    if ($pickupDate > $currentDate && in_array($order->order_status, $status)) {
                        // format date
                        $newDate = $this->formatDate($order->pickUpDate, $order->deliveryDate);

                        $order->pickUpDate = $newDate[0];
                        $order->deliveryDate = $newDate[1];
                        
                        $this->statusChecker($order);

                        if (!is_null($order->driverID)) {
                            $order->driverName = $this->driverM->get_get_drivers($order->driverID);
                        } else {
                            $order->driverName = 'N/A';
                        }

                        return $order;
                    }
                });

                $data['orders'] = array_values($newArr);
                $data['status'] = 'success';
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;
                $data['type'] = 'sheduledOrder';

              //  show($data); die;
                echo json_encode($data);
            }

           
        }
    }

    public function completed_orders() {
        if (!isObjectEmpty($this->fetch)) {
            $completedOrders = $this->orderM->get_completed_orders_by_company_id($this->fetch->companyID);
           // show($completedOrders); die;

           if(is_array($completedOrders)) {
            
                $currentDate = strtotime(date('Y-m-d'));
                $newArr = array_filter($completedOrders, function ($order) use ($currentDate) {
                    $deliveryDate = strtotime($order->deliveryDate);
                    if ($deliveryDate > $currentDate) {
                        // format date
                        $newDate = $this->formatDate($order->pickUpDate, $order->deliveryDate);

                        $order->pickUpDate = $newDate[0];
                        $order->deliveryDate = $newDate[1];
                        
                        $this->statusChecker($order);

                        return $order;
                    }
                });

                $data['orders'] = array_values($newArr);
                $data['status'] = 'success';
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;
                $data['type'] = 'completedOrder';

                echo json_encode($data);
           }
           
        }
    }

    public function incomplete_orders() {
        if (!isObjectEmpty($this->fetch)) {
        // show($this->fetch);
        // die;
        $incomplete = $this->orderM->get_incomplete_orders_by_company_id($this->fetch->companyID);

            if(is_array($incomplete)) {
                
                $currentDate = strtotime(date('Y-m-d'));
                $newArr = array_filter($incomplete, function ($order) use ($currentDate) {
                    $deliveryDate = strtotime($order->deliveryDate);
                    $pickupDate = strtotime($order->pickUpDate);
                    //$status = [UNASSIGNED, ORDER_CANCELLED, FAILED_ORDER];
                    if ($currentDate < $deliveryDate && $currentDate >= $pickupDate) {
                        // format date
                        $newDate = $this->formatDate($order->pickUpDate, $order->deliveryDate);

                        $order->pickUpDate = $newDate[0];
                        $order->deliveryDate = $newDate[1];
                        
                        $this->statusChecker($order);

                        return $order;
                    }
                });

                $data['orders'] = array_values($newArr);
                $data['status'] = 'success';
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;
                $data['type'] = 'incompletedOrder';

                echo json_encode($data);
            }
           
        }
    }


    public function order_details() {
     //   show($this->fetch); die;
        if (!isObjectEmpty($this->fetch)) {
            $order = $this->packagesM->get_package_orders($this->fetch->packageID);
            $order->orderDate = $this->orderM->get_orders_by_id($order->orderID)->date;

            if ($order) {
                if(!is_null($order->driverID)) {
                    $order->driverName = $this->driverM->get_get_drivers($order->driverID)->fullName;
                } else {
                    $order->driverName = 'N/A';
                }
               
                // check status 
                $this->statusChecker($order);
                $data['orders'] = $order;
                $data['status'] = 'success';
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
        }
    }

    public function order_history() {
        if (!isObjectEmpty($this->fetch)) {
            $hsitory = $this->orderM->get_history_orders_by_company_id($this->fetch->companyID);

            if (is_array($hsitory)) {
                $currentDate = strtotime(date('Y-m-d'));
                foreach($hsitory as $key => $order) {
                    // echo $order->deliveryDate;
                    $deliveryDate = strtotime($order->deliveryDate);
                    if ($currentDate > $deliveryDate) {
                        // format date
                        $newDate = $this->formatDate($order->pickUpDate, $order->deliveryDate);
                        
                        $order->pickUpDate = $newDate[0];
                        $order->deliveryDate = $newDate[1];
                        
                        $this->statusChecker($order);
                    } else {
                        unset($hsitory[$key]);
                    }
                }
              
                $data['orders'] = array_values($hsitory);
                $data['status'] = 'success';
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;
                $data['type'] = 'incompletedOrder';

                
                echo json_encode($data);
            }
        }
    }

    public function reshedule() {
        if (!isObjectEmpty($this->fetch)) {
          // show($this->fetch); 
            $reshedule = $this->orderM->reshedule_order($this->fetch);
            $order = $this->orderM->get_orders_by_id($this->fetch->orderID);
            
            // show($this->fetch); die;
            // show($order); die;

            if($reshedule && $order) {
                $currentDate = strtotime(date('Y-m-d'));
                $pcikUpdate = strtotime($order->pickUpDate);
                $deliveryDate = strtotime($order->deliveryDate);
                $date = $this->formatDate($order->pickUpDate, $order->deliveryDate);
                // for current day orders
                if($this->fetch->tab == 'currentDay') {
                    if ($currentDate === $pcikUpdate && $currentDate > $deliveryDate) {
                        // store tracking reshedule
                        // update tracker
                        $package = $this->packagesM->get_package_id($order->packageID);
                        $this->packagesM->update_tracking($package->trackingID, $this->fetch->packageID, RESHEDULE);

                        $data['remove'] = false;
                        
                    } else {
                        $data['remove'] = true;
                        $data['pickupdate'] = $date[0];
                        $data['deliverydate'] = $date[1];
                    }
                }


                // for incomplete orders
                if ($this->fetch->tab === 'incompleteOrders') {
                    if ($currentDate > $pcikUpdate) {
                        // store tracking reshedule
                        // update tracker
                        $package = $this->packagesM->get_package_id($order->packageID);
                        $this->packagesM->update_tracking($package->trackingID, $this->fetch->packageID, RESHEDULE);

                        $data['remove'] = true;
                    } else {
            
                        $data['remove'] = false;
                        $data['pickupdate'] = $date[0];
                        $data['deliverydate'] = $date[1];
                    }
                }

                // for history past
                if($this->fetch->tab === 'orderHistory') {
                    if($currentDate > $deliveryDate) {
                        // store tracking reshedule
                        // update tracker
                        $package = $this->packagesM->get_package_id($order->packageID);
                        $this->packagesM->update_tracking($package->trackingID, $this->fetch->packageID, RESHEDULE);
                        
                        $data['remove'] = true;
                    } else {
                        
                        $data['remove'] = false;
                        $data['pickupdate'] = $date[0];
                        $data['deliverydate'] = $date[1];
                    }
                }
               

                $data['status'] = 'success';
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;
                $data['message'] = 'Order resheduled successfully';

             //   show($data); die;

            } else {
                $data['status'] = 'failed';
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;
                $data['message'] = 'Unable to reshedule order';
                
            }

          //  show($data); die;

            echo json_encode($data);
        }
    }

    public function assign_driver() {
        $user = Auth::logged_in();
        if (!$user)
            $this->redirect('login');

        if (!isObjectEmpty($this->fetch)) {
            //show($this->fetch); die;
            $updateDriver = $this->orderM->update_driver($this->fetch, WAITING);
            $order = $this->orderM->get_orders_by_id($this->fetch->orderID);
           // $updatePackage = $this->packagesM->cancel_package($order->packageID, );

            if($updateDriver && $order) {
                // set status
                $this->statusChecker($order);
                
                $data['order'] = $order;
                $data['status'] = 'success';
                $data['message'] = 'Driver assigned successfully';
                $data['uri'] = ROOT;

                echo json_encode($data);

            } else {
                $data['status'] = 'failed';
                $data['message'] = 'Driver driver unable to be assigned';
                $data['uri'] = ROOT;

                echo json_encode($data);
            }

        }
    }

    public function reassign_driver()
    {
        $user = Auth::logged_in();
        if (!$user)
            $this->redirect('login');

      //  show($this->fetch); die;
        if (!isObjectEmpty($this->fetch)) {
            //show($this->fetch); die;
            $updateDriver = $this->orderM->update_driver($this->fetch);
            $order = $this->orderM->get_orders_by_id($this->fetch->orderID);

            if ($updateDriver && $order) {
                // set status
                $this->statusChecker($order);

                // store tracking reassign driver
                // update tracker
                $package = $this->packagesM->get_package_id($order->packageID);
                $this->packagesM->update_tracking($package->trackingID, $this->fetch->packageID, REASSIGN);

                $data['order'] = $order;
                $data['status'] = 'success';
                $data['message'] = 'Driver reassigned successfully';
                $data['uri'] = ROOT;

                echo json_encode($data);
            } else {
                $data['status'] = 'failed';
                $data['message'] = 'Driver driver unable to be reassigned';
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
        }
    }

    public function mark_as_delivered() {
  //  show($this->fetch); 

        if(!isObjectEmpty($this->fetch)) {
            // change statusto delivered
            $orderDelivered = $this->orderM->delivered($this->fetch->orderID, ORDER_DELIVERED);
            $packageDelivered = $this->packagesM->delivered_package($this->fetch->packageID, DELIEVRED_PACAKGES);

            if($orderDelivered && $packageDelivered) {
                $order = $this->orderM->get_orders_by_id($this->fetch->orderID);
                // $updatePackage = $this->packagesM->cancel_package($order->packageID, );
                $this->statusChecker($order);

                // store tracking delivered
                // update tracker
                $package = $this->packagesM->get_package_id($order->packageID);
                $this->packagesM->update_tracking($package->trackingID, $this->fetch->packageID, ITEMDELIVERED);
                
                $data['order'] = $order;
                $data['status'] = 'success';
                $data['message'] = 'Package delivered Successfully';
                $data['uri'] = ROOT;

                echo json_encode($data);
    
            }  else {
                $data['status'] = 'failed';
                $data['message'] = 'Unable to update status';
                $data['uri'] = ROOT;

                echo json_encode($data);
            }

        }
    }

    public function mark_as_failed() {
      //  show($this->fetch); die;

        if(!isObjectEmpty($this->fetch)) {
            // change statusto delivered
            $orderFailed = $this->orderM->failed_order($this->fetch->orderID, FAILED_ORDER);
            $packageFailed = $this->packagesM->failed_package($this->fetch->packageID, PACKAGE_FAILED);

            if($orderFailed && $packageFailed){
                $order = $this->orderM->get_orders_by_id($this->fetch->orderID);
                // $updatePackage = $this->packagesM->cancel_package($order->packageID, );
                $this->statusChecker($order);
                
                $data['order'] = $order;
                $data['status'] = 'success';
                $data['message'] = 'Package is failed';
                $data['uri'] = ROOT;

                echo json_encode($data);
    
            }  else {
                $data['status'] = 'failed';
                $data['message'] = 'Unable to update status';
                $data['uri'] = ROOT;

                echo json_encode($data);
            }

        }
    }

    public function delete_order() {
       // show($this->fetch); die;

        if(!isObjectEmpty($this->fetch)) {
            // change statusto delivered
            $orderDisabled = $this->orderM->delete_order($this->fetch->orderID, ORDER_DISABLED);
           // $packageFailed = $this->packagesM->failed_package($this->fetch->packageID, PACKAGE_FAILED);

            if($orderDisabled){
               // $order = $this->orderM->get_orders_by_id($this->fetch->orderID);
                // $updatePackage = $this->packagesM->cancel_package($order->packageID, );
              //  $this->statusChecker($order);
                
              //  $data['order'] = $order;
                $data['status'] = 'success';
                $data['message'] = 'Package deleted Successfully';
                $data['uri'] = ROOT;

                echo json_encode($data);
    
            }  else {
                $data['status'] = 'failed';
                $data['message'] = 'Unable to update status';
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
        }
    }
    
    private function statusChecker($order) {
        // fix statuses
        $order->orderStatus = '';
        $order->statusCol = '';

        if ($order->order_status == WAITING) {
            $order->orderStatus = 'waiting';
            $order->statusCol = 'warning';
        }

        if ($order->order_status == UNASSIGNED) {
            $order->orderStatus = 'Not assigned';
            $order->statusCol = 'info';
        }

        if ($order->order_status == PICKED_UP) {
            $order->orderStatus = 'Picked Up';
            $order->statusCol = 'info';
        }

        if ($order->order_status == ONWAY) {
            $order->orderStatus = 'On the way';
            $order->statusCol = 'info';
        }

        if ($order->order_status == STARTING) {
            $order->orderStatus = 'Starting';
            $order->statusCol = 'info';
        }

        if ($order->order_status == ORDER_DELIVERED) {
            $order->orderStatus = 'Delivered';
            $order->statusCol = 'success';
        }

        if ($order->order_status == ORDER_CANCELLED) {
            $order->orderStatus = 'Cancelled';
            $order->statusCol = 'danger';
        }

        if ($order->order_status == FAILED_ORDER) {
            $order->orderStatus = 'Failed';
            $order->statusCol = 'danger';
        }

    }

    private function formatDate($pickupDate, $deliveryDate) {
        // format date 
        $pickupDateArr = explode('-', $pickupDate);
     //   show($pickupDateArr);
        $newPickUpDate = date("F j", mktime(0, 0, 0, $pickupDateArr[1], $pickupDateArr[0]));

        // delivery date
        $deliveryDateArr = explode('-', $deliveryDate);
        $newDeliveryDate = date("F j", mktime(0, 0, 0, $deliveryDateArr[1], $deliveryDateArr[0]));

        return [$newPickUpDate, $newDeliveryDate];
    }
    
}