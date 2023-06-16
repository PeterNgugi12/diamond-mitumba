<div>
    <style>
  nav svg{
    height: 20px;
  }
  nav .hidden{
    display: block !important;
  }
</style>
  <div class = "container" style="padding:30px 0;">
  <div class = "row">
   <div class="col-md-12">
       <div class ="panel panel-default">
       <div class ="panel-heading">
          <div class = "row">
              <div class="col-md-6">
                 All Orders
              </div>
              
          </div>
       </div>
       <div class ="panel-body">
       
       <table class= "table table-striped">
          <thead>
           <tr>
             <th>OrderId</th>
             <th>Subtotal</th>
             <th>Transport</th>
             <th>Tax</th>
             <th>Total</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Address</th>
             <th>Status</th>
             <th>Order Date</th>
             <th colspan="2" class="text-center">Action</th>
             
           </tr>
          </thead>
          <tbody>
             @foreach ($orders as $order)
                  <tr>
                  <td>{{$order->id}}</td>
                  <td>Ksh{{$order->subtotal}}</td>
                  <td>Ksh{{$order->transport}}</td>
                  <td>Ksh{{$order->tax}}</td>
                  <td>Ksh{{$order->total}}</td>
                  <td>{{$order->firstname}}</td>
                  <td>{{$order->lastname}}</td>
                  <td>{{$order->email}}</td>
                  <td>{{$order->address}}</td>
                  <td>{{$order->status}}</td>
                  <td>{{$order->created_at}}</td>
                  <td>
                  <a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}"class="btn btn-info btn-sm">Details</a>
                  </td>
                  <td>
                     <div class="dropdown">
                      <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status<span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Delievered</a></li>
                        <li><a href="#">Canceled</a></li>
                      </ul>
                     </div>
                  </td>
                 
                  </tr>
             @endforeach
          </tbody>
         </table>
         {{$orders->links()}}
       </div>

       </div>
   </div>
  </div>
  </div>
</div>
