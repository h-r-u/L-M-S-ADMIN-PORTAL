<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\EnrollmentMail;
use App\Models\ParentEnrollment;
use App\Models\SelfSponsored;
use App\Models\Scholarship;
use App\Models\JobApplication;
use App\Models\Educator;
use App\Models\Student;
use App\Models\Order;
use App\Models\Item;
use App\Models\Invoice;
use App\Models\Transaction;


class EnrollmentController extends Controller
{
  public function index (String $string) {
    $enrollment[] = 'enrollment';
    $enrollment['title'] = $string;
    $enrollment['sponsored'] = ParentEnrollment::where('type', 'parent-sponsored')->get();
    $enrollment['self-sponsored'] = SelfSponsored::where('type', 'self-sponsored')->get();
    $enrollment['scholarship'] = Scholarship::where('type', 'scholarship')->get();
    $enrollment['job-application'] = JobApplication::where('type', 'educator')->get();
    //return $enrollment;
    return view('enrollment.index', compact('enrollment'));
  }
  
  public function show (String $id) {
    $enrollment[] = 'enrollment';
    $enrollment['title'] = $id;
    $enrollment = ParentEnrollment::findOrFail($id);
    $enrollment = SelfSponsored::findOrFail($id);
    $enrollment = Scholarship::findOrFail($id);
    $enrollment = JobApplication::findOrFail($id);
    //return $enrollment;
    return view('enrollment.section.show', compact('enrollment'));
  }

  public function generateStaffId() {
    $prefix = 'HRU_';
    $year = date('Y');
    $lastStaffId = JobApplication::latest()->first();
    $number = ($lastStaffId) ? ((int) substr($lastStaffId->admission_number, -4)) + 1 : 1;
    $admissionNumber = $prefix . $year . str_pad($number, 4, '0', STR_PAD_LEFT);
    return $admissionNumber;
}


  public function generateAdmissionNumber() {
    $prefix = 'HRU_';
    $year = date('Y');
    $lastAdmission = Student::latest()->first();
    $number = ($lastAdmission) ? ((int) substr($lastAdmission->admission_number, -4)) + 1 : 1;
    $admissionNumber = $prefix . $year . str_pad($number, 4, '0', STR_PAD_LEFT);
    return $admissionNumber;
}

  public function transaction_id() {
    $prefix = 'HRTTI_';
    $year = date('Y');
    $last_id = Transaction::latest()->first();
    $number = ($last_id) ? ((int) substr($last_id->transaction_id, -4)) + 1 : 1;
    $transactionId = $prefix . $year . str_pad($number, 4, '0', STR_PAD_LEFT);
    return $transactionId;
}

  public function patch (Request $request,String $id) {
    //Aprove Enrolment [status=true]
    $enrollment[] = 'enrollment';
    $enrollment['title'] = $id;
    $enrollment = ParentEnrollment::findOrFail($id);
    $enrollment = SelfSponsored::findOrFail($id);
    $enrollment = Scholarship::findOrFail($id);
    $enrollment = JobApplication::findOrFail($id);
    $enrollment->type =  $enrollment['type'];
    $enrollment->first_name = $enrollment['first_name'];
    $enrollment->middle_name = $enrollment['middle_name'];
    $enrollment->last_name = $enrollment['last_name'];
    $enrollment->passport_photo = $enrollment['passport_photo'];
    $enrollment->phone_number = $enrollment['phone_number'];
    $enrollment->email = $enrollment['email'];
    $enrollment->essay = $enrollment['essay'];
    $enrollment->course = $enrollment['course'];
    $enrollment->level = $enrollment['level'];
    $enrollment->exam_location = $enrollment['exam_location'];
    $enrollment->intake = $enrollment['intake'];
    $enrollment->status =  1;
    $enrollment->update();
    //check if application is student or educator
    if ($enrollment['type'] === 'educator') {
    $staff_id = $this->generateStaffId();
    $student = new Educator;
    $student->full_name = $enrollment['first_name'].$enrollment['middle_name'].$enrollment['last_name'];
    $student->admission_number = $staff_id;
    $student->passport_photo = $enrollment['passport_photo'];
    $student->email = $enrollment['email'];
    $student->phone_number = $enrollment['phone_number'];
    $student->course = $enrollment['course'];
    $student->intake = $enrollment['intake'];
    $student->level = $enrollment['level'];
    $student->exam_location = $enrollment['exam_location'];
    $student->status = 0;
    $student->save();
      $alert = [
      'title' => 'Congratulations'.$enrollment['first_name'].'!',
      'body' => 'Your application to join Homeschool Robotics University was successful. To activate your educator account, visit our educator portal https://www.educator.hru.co.ke/staff-account/'.$staff_id.'/create/ and verify your application. Thank you for choosing Homeschool Robotics University. Educating Africa since 2019',
    ];
    } elseif($enrollment['type'] === 'scholarship') {
      //if student qualifies for aid, grant scholarship and access to course work 
      $admission_number = $this->generateAdmissionNumber();
      $student = new Student;
      $student->full_name = $enrollment['first_name'].$enrollment['middle_name'].$enrollment['last_name'];
      $student->admission_number = $admission_number;
      $student->passport_photo = $enrollment['passport_photo'];
      $student->email = $enrollment['email'];
      $student->phone_number = $enrollment['phone_number'];
      $student->course = $enrollment['course'];
      $student->intake = $enrollment['intake'];
      $student->level = $enrollment['level'];
      $student->exam_location = $enrollment['exam_location'];
      $student->status = 0;
      $student->save();

      //fetch order details
      $order = Order::findOrFail($enrollment['email']);

      //fetch invoice details
      $invoice = Invoice::findOrFail($order['order_id']);

      //update order status
      $order->order_id = $order['order_id'];
      $order->email = $order['email'];
      $order->course = $order['course'];
      $order->level = $order['level'];
      $order->intake = $order['intake'];
      $order->status = 1;
      $order->update();

      //scholarship transaction
      $transaction = new Transaction;
      $transaction->email = $enrollment['email'];
      $transaction->phone = $enrollment['phone_number'];
      $transaction->amount = $invoice['amount'];
      $transaction->order_id = $invoice['order_id'];
      $transaction->invoice_id = $invoice['invoice_id'];
      $transaction->transaction_type = 'scholarship';
      $transaction->transaction_id = $this->transaction_id();
      $transaction->transaction_code = $this->transaction_id();
      $transaction->transaction_status = true;
      $transaction->status = true;
      $transaction->save();

      //update invoice status
      $invoice->order_id = $invoice['order_id'];
      $invoice->invoice_id = $invoice['invoice_id'];
      $invoice->amount = $invoice['amount'];
      $invoice->status = 1;
      $invoice->update();

        $alert = [
        'title' => 'Congratulations'.$enrollment['first_name'].'!',
        'body' => 'Your application to join Homeschool Robotics University was successful. To activate your student account, visit our student portal https://www.student.hru.co.ke/admission/'.$admission_number.' and verify your application. When asked to enter your admission number, use ADM:'.$enrollment['admission_number'].'. Thank you for choosing Homeschool Robotics University. Educating Africa since 2019',
      ];
    } else {
    $admission_number = $this->generateAdmissionNumber();
    $student = new Student;
    $student->full_name = $enrollment['first_name'].$enrollment['middle_name'].$enrollment['last_name'];
    $student->admission_number = $admission_number;
    $student->passport_photo = $enrollment['passport_photo'];
    $student->email = $enrollment['email'];
    $student->phone_number = $enrollment['phone_number'];
    $student->course = $enrollment['course'];
    $student->intake = $enrollment['intake'];
    $student->level = $enrollment['level'];
    $student->exam_location = $enrollment['exam_location'];
    $student->status = 0;
    $student->save();

      $alert = [
      'title' => 'Congratulations'.$enrollment['first_name'].'!',
      'body' => 'Your application to join Homeschool Robotics University was successful. To activate your student account, visit our student portal https://www.student.hru.co.ke/admission/'.$admission_number.' and verify your application. When asked to enter your admission number, use ADM:'.$enrollment['admission_number'].'. Thank you for choosing Homeschool Robotics University. Educating Africa since 2019',
    ];
    }

    $email = $enrollment['email'];
    Mail::to($email)->send(new EnrollmentMail($alert));
    return redirect()->back()->with('success', 'Application verified successfully!');
  }

  public function discard (Request $request, String $id) {
    $enrollment[] = 'enrollment';
    $enrollment['title'] = $id;
    $enrollment = ParentEnrollment::findOrFail($id);
    $enrollment = SelfSponsored::findOrFail($id);
    $enrollment = Scholarship::findOrFail($id);
    $enrollment = JobApplication::findOrFail($id);
    
    $order = Order::findOrFail($enrollment['email']);
    $item = Item::findOrFail($order['order_id']);
    $invoice = Invoice::findOrFail($order['order_id']);
    $invoice->delete();
    $item->delete();
    $order->delete();
    $enrollment->delete();
    $alert = [
      'title' => 'Hey'.$enrollment['first_name'].'!',
      'body' => 'Your application to join Homeschool Robotics University was not successful. To make another application, visit our enrollment portal https://www.enrollment.hru.co.ke/ and make new application. Thank you for choosing Homeschool Robotics University. Educating Africa since 2019',
    ];
    $email = $enrollment['email'];
    Mail::to($email)->send(new EnrollmentMail($alert));
    return redirect('/')->with('success', 'Application discarded successfully');
  }
}
