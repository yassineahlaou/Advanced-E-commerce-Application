

<style>
	.contain{
        background-color: #eee;
        padding-bottom:10px;
        

       
    }
    .hr{
        background-color:black;
        border: 1px solid #ccc;
        width:90%;
        margin :0 15px;
       
        
    }

.card {
    border-radius:8px;
    background-color: #eee;
    padding: 0 15px;
    border: none;
    
    
}
.card:hover{
    background-color:#fff
}
.input-box {
    position: relative
}
.input-box i {
    position: absolute;
    right: 13px;
    top: 15px;
    color: #ced4da
}
.form-control {
    height: 50px;
    background-color: #eeeeee69
}
.form-control:focus {
    background-color: #eeeeee69;
    box-shadow: none;
    border-color: #eee
}
.list {
    padding-top: 20px;
    padding-bottom: 10px;
    display: flex;
    align-items: center
}
.border-bottom {
    border-bottom: 2px solid #eee
}
.list i {
    font-size: 19px;
    color: red
}
.list small {
    color: #dedddd
}
</style>

@if($products -> isEmpty())
<h3 class="text-center" style="color:gary">No product Found</h3>

@else


<div class="contain">
            


            @foreach($products as $item)
            <div class="card">
   <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                <div class="list">  <img src="{{ asset($item->product_thumbnail) }}" style="width: 70px; height: 70px;"> 

   <div class="d-flex flex-column ml-3" style="margin-left: 10px;"> <span>{{ $item->product_name_en }} </span><!-- <small> ${{ $item->selling_price }}</small> --></div>
                </div>
                </a>
                </div>
                <div class="hr"></div>
                @endforeach

</div>

      
@endif