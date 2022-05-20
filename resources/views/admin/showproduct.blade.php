

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('admin.sidebar')
      @include('admin.navbar')
      
      <div style="padding-bottom:30px;" class="container-fluid page-body-wrapper">
        <div class="container" align="center">
           
            @if(session()->has('success'))

        <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">x</button>

        {{session()->get('success')}}

        </div>

        @endif
            <table>
                <tr style="background-color:rgb(216, 207, 207)">
                    <td style="padding: 20px;">Title</td>
                    <td style="padding: 20px;">Description</td>
                    <td style="padding: 20px;">Quantity</td>
                    <td style="padding: 20px;">Price</td>
                    <td style="padding: 20px;">Image</td>
                    <td style="padding: 20px;">Update</td>
                    <td style="padding: 20px;">Delete</td>
                </tr>
                
                
                @foreach ($data as $product)
                <tr align="center" style="background-color: rgba(0, 0, 0, 0.342);">
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                    <img height="100px" width="100px" src="/productimage/{{$product->image}}">
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('updateview' , $product->id)}}">Update</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure')" href="{{url('deleteproduct' , $product->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
      </div>      
      
      @include('admin.script')

      <!-- partial -->
      
        <!-- partial -->

          <!-- partial -->
        
  </body>
</html>
