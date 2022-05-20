

<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    @include('admin.css')
    <style type="text/css">
        .title
        {
            color:red; 
            Padding-top: 25px; 
            font-size: 25px;
        }
    
        label
        {
          display: inline-block;
          width: 200px;
    
        }
        </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('admin.sidebar')
      @include('admin.navbar')
      
      
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
        <h1 class="title">Update Product</h1>
          
        @if(session()->has('success'))

        <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">x</button>

        {{session()->get('success')}}

        </div>

        @endif

        <form action="{{url('updateproduct' , $product->id)}}" method="post" enctype="multipart/form-data">
          
          @csrf

        <div style="padding:15px;">
            <label>Product title</label>
            <input style="color:black" type="text" name="title" value="{{$product->title}}" required="">   
        </div>
        
        <div style="padding:15px;">
            <label>Price</label>
            <input style="color:black" type="number" name="price" value="{{$product->price}}" required="">   
        </div>
        
        <div style="padding:15px;">
            <label>Description</label>
            <input style="color:black" type="text" name="description" value="{{$product->description}}" required="">   
        </div>
        
        <div style="padding:15px;">
            <label>Quantity</label>
            <input style="color:black" type="text" name="quantity" value="{{$product->quantity}}" required="">   
        </div>
        <div style="padding:15px;">
            <label>Old Image</label>
            <img height="100" width="100" src="/productimage/{{$product->image}}">
        </div>

        <div style="padding:15px;">
            {{-- <label>Change The Image</label> --}}
          <input type="file" name="image">  
          
      </div>

      <div style="padding:15px;">
        <input class="btn btn-success" type="submit">
      </div>
      </form>
        </div>
        </div>
      
      
      @include('admin.script')
  </body>
</html>
